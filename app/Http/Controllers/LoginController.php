<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class LoginController extends Controller
{
    ////show method//
    public function show(){
        return view('loginform');
    }

    public function checklogin(Request $request){

        $user_data = new User();

        $password  = $request->get('password');
        $email  = $request->get('email');

        $value = User::where('email', $email)
                ->where('password', $password)
                ->value('email');
        
        $request->session()->put('email', $value);

        if(!$value){
            return redirect('loginform');
        }else{
            return redirect('dashboard'); 
        }

    }
   
}


?>
