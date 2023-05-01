<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashPageController extends Controller
{
    public function dashboard()
    {
        return view('dash.home');
    }
}
