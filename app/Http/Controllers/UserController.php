<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showRegisterForm(){
        return view('auth.register');
    }

    public function register(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('auth.show.login')->with('successRegister' , 'ثبت نام با موفقیت انجام شد!');

    }

    public function showLoginform(){
        return view('auth.login');
    }

    public function login(Request $request){

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $data = $request->only('email' , 'password');

        if(Auth::attempt($data)){
            $user = Auth::user();
            Session()->put('user', $user);
            return redirect()->route('todo.index');
        }

        return redirect()->route('auth.show.login')->with('failedInLogin' , 'رمز عبور و یا ایمیل صحیح نیست!');

    }

    public function logout(){
        Auth::logout();
 
        session()->invalidate();
     
        session()->regenerateToken();
     
        return redirect()->route('todo.index');
    }
    
}
