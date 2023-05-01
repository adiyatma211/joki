<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function transaction()
    {

        return view('pages.lp.transaction', [
            'transaction' => Transaction::where('customer_id', Auth::user()->id)->with('seller', 'product')->get(),
        ]);
    }

    public function book(Request $request)
    {
        $data = json_decode(Transaction::latest()->first());
        if ($data == null) {
            $thisinvoice = 1;
        }else {
            $max = Transaction::max('invoice_id');
            $thisinvoice = $max + 1;
        }

        Transaction::create([
            'invoice_id' => $thisinvoice,
            'product_id' => $request->product,
            'customer_id' => Auth::user()->id,
            'seller_id' => $request->seller,
            'date' => $request->date,
            'status' => '1',
            'note' => $request->notes,
        ]);

        $id = Transaction::where('invoice_id', $thisinvoice)->first();

        $dataproduk = Product::where('id', $request->product)->first();

        $stok = $dataproduk->penjualan + 1;

        Product::where('id', $request->product)->update(['penjualan' => $stok]);

        return array('status' => 'success', 'idtrans' => $id->id);
    }
    
    public function uphari(Request $request)
    {
        Transaction::where('id', $request->id)->update(['date' => $request->date]);
            
        return array('status' => 'success');

    }

    public function payment(Transaction $transaction)
    {
        if ($transaction->status == '1') {
            return view('pages.lp.proof', compact('transaction'));
        } else {
            return back()->with('fail', 'Transaksi sudah dibayar');
        }

    }

    public function tfupload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        return $imageName;
    }

    public function confirmpayment(Request $request)
    {
        Transaction::where('id', $request->idtrans)->update(['proof' => $request->proof, 'status' => '2']);

        return array('status' => 'success');
    }

    public function orderconfirmed(Request $request)
    {
        Transaction::where('id', $request->id)->update(['status' => '3']);

        return array('status' => 'success');
    }

    public function ordercanceled(Request $request)
    {
        Transaction::where('id', $request->id)->update(['status' => '4']);
        $datatransaksi = Transaction::where('id', $request->id)->with('product')->first();

        $dataproduk = Product::where('id', $datatransaksi->product->id)->first();

        $stok = $dataproduk->penjualan - 1;

        Product::where('id', $datatransaksi->product->id)->update(['penjualan' => $stok]);

        return array('status' => 'success');
    }

    public function transactioninvoice(Transaction $transaction)
    {
        if ($transaction->customer_id != Auth::user()->id) {
            return back()->with('fail', 'Permission Denied');
        } else {
            return view('pages.lp.invoice', compact('transaction'));
        }

    }

}
