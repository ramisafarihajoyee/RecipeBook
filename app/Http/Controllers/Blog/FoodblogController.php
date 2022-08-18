<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Recipe;

class FoodblogController extends Controller
{
    function showr(){
        return view('foodblog');
    }
    //show method
    function show(){
        $blog_data = new User();
        $recipe_data = new Recipe();
        $sessiondata = session('email');  
        $blog_username_value = User::where('email', $sessiondata)
                            ->value('blog_username');
        // $image_value = Recipe::where('blog_username', $blog_username_value)
        //             ->value('image');
        $recipe_list = Recipe::where('blog_username', $blog_username_value)
                ->get();
        // echo $recipe;

        // return view('/foodblog')->with('pass_values', ['recipe' => $recipe_list]);
        // dd($recipe_list);
        return view('/foodblog', ['recipe' => $recipe_list]);
        // echo $recipe[0]['blog_username'];
        // return view('/foodblog')->with('pass_values', ['image'=> $image_value, 'blog_username'=> $blog_username_value]);
        // echo $value;
        // return view('/foodblog')->with('blog_username', $value);
        //return view('/foodblog.show');
    }

    //check if the user is rgistered in blog
    function check(){
        $blog_data = new User();
        $data = session('email');
        $value = User::where('email', $data)
                ->value('blog_username');

        if($value) {
            return redirect('foodblog.show');
        }
        else{
            return redirect('registerinblog');
        }
    }
        // return view('foodblog');
        // return View::make('/dashboard')->with('blog_username', $value);


    //show recipe in dashboard
    // function showrecipe(){
    //     $blog_data = new User();
    //     $recipe_data = new Recipe();
    //     $data = session('username');
    //     $blog_username_value = User::where('name', $data)
    //             ->value('blog_username');
    //     $image_value = Recipe::where('blog_username', $blog_username_value)
    //             ->value('image');

        
            
    //     return view('/foodblog')->with('image', $image_value);
    //     // if($value) {
    //     //     return redirect('foodblog');
    //     // }
    //     // else{
    //     //     return redirect('registerinblog');
    //     // }
    // }
}
