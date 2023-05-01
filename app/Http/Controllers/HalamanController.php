<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HalamanController extends Controller
{
    public function home()
    {
        return view('pages.lp.index', [
            'category' => Category::all(),
        ]);
    }

    public function shop()
    {
        if (request('cat')) {
            $product = Product::where('category_id', request('cat'))->get();
        } else {
            $product = Product::with('user')->get();
        }

        return view('pages.lp.shop', [
            'category' => Category::all(),
            'product' => $product,
        ]);
    }

    public function productdetail(Product $product)
    {
        return view('pages.lp.proddetail', [
            'product' => $product,
            'all' => Product::where('user_id', $product->user_id)->with('user')->get(),
        ]);
    }
    

    public function about()
    {
        return view('pages.lp.about');
    }
    
    public function contact()
    {
        return view('pages.lp.contact');
    }
    



}
