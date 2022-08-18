<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterinblogController extends Controller
{

    function show(){
        return view('/registerinblog');
    }

    function register(Request $request){

        $blog_data = new User();
        $blog_username = $request->input('name');
        $sessiondata = session('email');
        
        $value = User::where('email', $sessiondata)
                ->update(['blog_username' => $blog_username]);
        if($value) {
            return redirect('foodblog.show');
        }
        else echo 'Try again';
    }
}
