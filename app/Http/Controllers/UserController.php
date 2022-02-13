<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserController extends Controller
{
    public function create_user(Request $user_data){

        $validated = $user_data->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
        ]);

        $create_user=User::create([
            'name'=>$user_data->name,
            'email'=>$user_data->email,
            'password'=>Hash::make($user_data->password),
        ]);

        if($create_user){
            return Redirect::Route('login')->with(
                'success',
                'Succesfully registerd, Please login'
            ); 
        }
        else{
            return Redirect::back()->with(
                'fail',
                'Oops! Something went wrong, please try again'
            );  
        }
    }
}
