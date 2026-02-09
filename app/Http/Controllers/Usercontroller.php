<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class Usercontroller extends Controller
{

public function index(){
    if(auth()->check()){
        return view('dashboard');
    }else{
        return redirect('/login');
    }
}

    public function login(Request $request){
        $incomingFields = $request->validate([
                'name' => 'required',
                'password' => 'required'
        ]);
        if(auth()->attempt(['name'=> $incomingFields['name'],'password'=> $incomingFields['password']])){
            $request->session()->regenerate();
            return redirect('/dashboard');
        }else{
            return redirect('/');
        }
    }
     public function register(Request $request){
        $incomingFields = $request->validate([
                'name' => 'required',
                'email' => 'required',
                'password' => 'required'
        ]);
        $user = User::create($incomingFields);
        auth()->login($user);
        return redirect('/dashboard');
    }
    public function logout(){
        auth()->logout();
        return redirect('/');
    }
   
}
