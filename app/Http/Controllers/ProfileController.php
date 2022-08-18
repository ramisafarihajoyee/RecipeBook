<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Recipe;
use App\Models\Favorite;
use App\Models\Competition;

class ProfileController extends Controller
{
    
    function index(){
        $sessiondata = session('email');  
        $info = User::where('email', $sessiondata)
                ->get();
        $result_fetch = Competition::where('email', $sessiondata)
                ->orderBy('competition_year', 'desc')
                ->orderBy('position')->get();
        return view('profile', ['info' => $info, 'result' => $result_fetch]);
    }

    function resultshow(){
        $sessiondata = session('email');  
        $result_fetch = Competition::where('email', $sessiondata)
                    ->orderBy('competition_year', 'desc')
                    ->orderBy('position')->get();
        return view('competition/result', ['result_list' => $result_fetch]);
    }


    function editshow(){
        return view('profileeditform');
    }


    function edit_form(Request $request){
        $user_data = new User();
        $name  = $request->input('name');
        $account = $request->input('account');
        $baking_skill = $request->input('skill');

        $sessiondata = session('email');

        if($name && $account && $baking_skill){
            $update_profile = User::where('email', $sessiondata)
                  ->update(['name' => $name, 'social_medias'=>$account, 'baking_skills'=>$baking_skill]);
        }
        else if(!$name && $account && $baking_skill){
           $update_profile = User::where('email', $sessiondata)
                 ->update(['social_medias'=>$account, 'baking_skills'=>$baking_skill]);
        }
        else if(!$name && !$account && $baking_skill){
            $update_profile = User::where('email', $sessiondata)
                  ->update(['baking_skills'=>$baking_skill]);
        }
        else if(!$name && $account && !$baking_skill){
            $update_profile = User::where('email', $sessiondata)
                  ->update(['social_medias'=>$account]);
        }
        else if($name && !$account && !$baking_skill){
            $update_profile = User::where('email', $sessiondata)
                  ->update(['name' => $name]);
        }
        else if($name && !$account && $baking_skill){
            $update_profile = User::where('email', $sessiondata)
                  ->update(['name' => $name, 'baking_skills'=>$baking_skill]);
        }
        else if($name && $account && !$baking_skill){
            $update_profile = User::where('email', $sessiondata)
                  ->update(['name' => $name, 'social_medias'=>$account]);
        }
        // $update_profile = User::where('email', $sessiondata)
        //         ->update(['name' => $name, 'social_medias'=>$account, 'baking_skills'=>$baking_skill]);

        if($update_profile) {
            return redirect('profile');
        }
        else{
            return redirect('profileeditform');
        }
    }


    function show(){
        return view('notebook/create');
    }

    function favoritelist(){
        $sessiondata = session('email');  
        $recipe_fetch = Favorite::where('email', $sessiondata)
                ->get();
        return view('favorite', ['lists' => $recipe_fetch]);
    }

    function add($id){
        $email = session('email'); 
        $fav = Favorite::where('email', $email)
                ->where('recipe_id', $id)
                ->value('recipe_id');

        if($fav == null){
            $fav = Favorite::insert(['recipe_id'=>$id, 'email'=>$email]);
            if($fav) {
                return redirect('favorite');
            }
            else{
                return redirect('dashboard');
            }
        }else{
            return redirect('dashboard');
        }
    }

    function unfavorite_recipe($id){
        // $favorite_data = new Favorite();
        $email = session('email');
            $unfavorite = Favorite::where('recipe_id', $id)
                        ->where('email', $email)
                        ->delete();
            if($unfavorite){
                return redirect('favorite');
            }else{
                return redirect('/dashboard');
            }
    }

}
