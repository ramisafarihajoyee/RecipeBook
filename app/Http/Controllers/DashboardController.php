<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Recipe;

class DashboardController extends Controller
{
    //
    public function index(){
        $recipes = Recipe::all();
        return view("dashboard")->with('recipes', $recipes);
    }

    function like($id){
        $recipes = Recipe::all();
        $like = Recipe::where('id', $id)
                ->value('like');
        $like = $like + 1;
        $update_like = Recipe::where('id', $id)
                    ->update(['like' => $like]);
        return redirect("dashboard")->with('recipes', $recipes);
    }

    function dislike($id){
        $recipes = Recipe::all();
        $dislike = Recipe::where('id', $id)
                ->value('dislike');
        $dislike = $dislike + 1;
        $update_dislike = Recipe::where('id', $id)
                    ->update(['dislike' => $dislike]);
        return redirect("dashboard")->with('recipes', $recipes);
    }

    function toprated(){
        $recipes = Recipe::all();
        $toprated = Recipe::orderBy('views', 'desc')->Paginate(5);
        return view("toprated")->with('toprated', $toprated);
    }

}
