<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Symfony\Component\Console\Input\Input;
use App\Models\User;
use Auth;

class AuthController extends Controller
{
    public function showLogin(Request $request)
    {
        if (Auth::check()) {
            return redirect('/');
        } else {
            return view('auth.login');
        }
    }
    
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'=>'required|email|exists:users,email',
            'password'=>'required'
        ]);
        // dd($request->except('password'));
        if ($validator->fails()) {
            return redirect('/login')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput($request->except('password')); // send back the input (not the password) so that we can repopulate the form
        } else {
            if (Auth::attempt(request(['email','password']))) {
                return redirect('/');
            } else {
                // validation not successful, send back to form
                return redirect('/login')->withErrors(['Invalid login or password']);
            }
        }
    }

    public function showRegister(Request $request)
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:8'
        ]);
        
        if ($validator->fails()) {
            return redirect('/register')
            ->withErrors($validator) // send back all errors to the login form
            ->withInput($request->except('password')); // send back the input (not the password) so that we can repopulate the form
        } else {
            $user = User::create(request(['name', 'email', 'password']));
            auth()->login($user);
            return redirect('/games');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
