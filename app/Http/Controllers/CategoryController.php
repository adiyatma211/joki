<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        Category::create([
            'image' => $request->image,
            'name' => $request->name,
        ]);

        return array('status' => 'success');
    }

    public function update(Request $request)
    {
        Category::where('id', $request->id)->update([
            'image' => $request->image,
            'name' => $request->name,
        ]);

        return array('status' => 'success');
    }

    public function destroy(Request $request)
    {
        Category::destroy($request->id);

        return array('status' => 'success');
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
}
