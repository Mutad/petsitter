<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    public function show()
    {
        return view('user.profile', ['user'=>Auth::user(),'pets'=>Auth::user()->pets()]);
    }

    public function edit()
    {
        return view('user.update',['user'=>Auth::user()]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name'=>'required|min:3',
            'country'=>'string',
            'city'=>'string'
        ]);
        
        Auth::user()->update($validated);
        return redirect()->route('user.show',Auth::user());
    }
}
