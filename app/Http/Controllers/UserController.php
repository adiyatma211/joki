<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function storeuser(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role,
        ]);

        return array('status' => 'success');
    }

    public function updateuser(Request $request)
    {
        User::where('id', $request->id)->update([
            'name' => $request->name,
            'role_id' => $request->role,
        ]);

        return array('status' => 'success');
    }

    public function destroyuser(Request $request)
    {
        User::destroy($request->id);

        return array('status' => 'success');
    }
}
