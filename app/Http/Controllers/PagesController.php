<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Role;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function dashboard()
    {
        if (Gate::allows('admin')) {
            $bestseller = Product::orderBy('penjualan', 'desc')->with('user')->take(3)->get();
            // $bestseller = Transaction::withCount('product')->get();

            // dd($bestseller);
            return view('pages.admin.index', [
                'bestseller' => $bestseller,
            ]);
        }

        if (Gate::allows('seller')) {

            $bestseller = Product::where('user_id', Auth::user()->id)->orderBy('penjualan', 'desc')->with('user')->take(3)->get();
            // $bestseller = Transaction::withCount('product')->get();

            // dd($bestseller);
            return view('pages.admin.index', [
                'bestseller' => $bestseller,
            ]);

        }


    }

    public function user()
    {
        return view('pages.admin.users', ['user' => User::with('role')->get()]);
    }

    public function adduser()
    {
        return view('pages.admin.adduser', ['role' => Role::all()]);
    }

    public function category()
    {
        return view('pages.admin.category', ['category' => Category::all()]);
    }

    public function product()
    {
        return view('pages.admin.product', ['product' => Product::where('user_id', Auth::user()->id)->with('category', 'user')->get()]);
    }

    public function addproduct()
    {
        return view('pages.admin.addproduct', ['category' => Category::all()]);
    }

    public function orderconfirmation()
    {
        return view('pages.admin.confirmation', [
            'transaction' => Transaction::where('seller_id', Auth::user()->id)->where('status', '2')->with('seller', 'product')->get(),
        ]);
    }

    public function mytransaction()
    {
        return view('pages.admin.transaction', [
            'transaction' => Transaction::where('seller_id', Auth::user()->id)->where('status', '>=', '2')->with('seller', 'product')->get(),

        ]);
    }
}
