<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class AuthController extends Controller
{
    public function login_attempt(Request $login_data){
        $validated = $login_data->validate([ //login data validation
            'email' => 'required',
            'password' => 'required',
        ]);
        if(Auth::attempt(['email'=>$login_data->email,'password'=>$login_data->password])){ 
            return Redirect::Route('all-post');
        }
        else{
            return Redirect::Route('login')->with(
                'fail',
                'Invalid username or password.'
            ); 
        }

    }

    public function logout(){
        Auth::logout();
        return Redirect::Route('index');  
        
    }
}
