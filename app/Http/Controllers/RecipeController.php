<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{

    public function index(){
        return view('/recipes');
    }

    function toprated(){
        $recipes = Recipe::all();
        $toprated = Recipe::orderBy('views', 'desc')->Paginate(5);
        $recent = Recipe::orderBy('id', 'desc')->Paginate(5);
        return view("recipes", compact('toprated', 'recent'));
    }

    public function searchbybox(Request $request){

        $recipe_search = new Recipe();

        $search_word  = $request->get('search');
        // $recipe_list=Recipe::first()->Search($search_word);
        // $results = [];
        // $results['recipe'] = Recipe::search($search_word);
        $results = Recipe::Search($search_word);
        // ->paginate(2);
        $result_recipe = $results->get();
        return view('searchresultshow', ['results' => $result_recipe]);

    }

}
