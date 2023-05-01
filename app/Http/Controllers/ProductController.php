<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function uptempimage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        return $imageName;
    }

    public function store(Request $request)
    {


        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $request->image,
            'category_id' => $request->category,
            'price' => $request->price,
            'user_id' => $request->user,
        ]);

        return array('status' => 'success');
    }
}
