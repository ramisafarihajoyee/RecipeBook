<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recipe;

class ShowfullrecipeController extends Controller
{
    public function show(){
        return view("showfullrecipe");
    }

    public function showid($id = 1){
        // $recipes = Recipe::all();
        // $recipes = Recipe::get($id);
        $recipes = Recipe::where('id', $id)->get();
        $view = Recipe::where('id', $id)
                ->value('views');
        $view = $view + 1;
        $update_view = Recipe::where('id', $id)
                    ->update(['views' => $view]);
        $recipes = Recipe::where('id', $id)->get();
        return view("showfullrecipe")->with('recipes', $recipes);
    }
}
