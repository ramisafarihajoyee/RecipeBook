<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class SignupController extends Controller
{
    //index method//
    public function index(){
        return view('signup');
    }

    //store method//
    public function store(Request $request){

            $user_data = new User();

            $name  = $request->input('name');
            $email  = $request->input('email');
            $password = $request->input('password');
            $account = $request->input('account');
            $baking_skills = $request->input('skill');

            $value = User::insert(['name'=>$name, 'email'=>$email, 'password'=>$password,
            'social_medias'=> $account, 'baking_skills'=>$baking_skills ]);

            $request->session()->put('email', $email);

            if($value == 0){
                return redirect('signup');
            }else{
                return redirect('dashboard'); 
            }
    }
}
