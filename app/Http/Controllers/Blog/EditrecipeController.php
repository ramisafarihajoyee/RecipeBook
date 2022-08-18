<?php

namespace App\Http\Controllers\Blog;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Recipe;

class EditrecipeController extends Controller
{
    //
    public function show(){
        return view('editrecipeform');
    }


    public function check_id($id = 1){
        $data = session('email');
        $blog_username = User::where('email', $data)
                ->value('blog_username');
        $fetch_blog_username = Recipe::where('id', $id)
                ->value('blog_username');
        if ($blog_username == $fetch_blog_username){
            $recipes = Recipe::where('id', $id)->get();
            return view('editrecipeform')->with('recipes', $recipes);
        }else{
            return redirect('restriction');
        }
    }


    function edit(Request $request, $id){

        $recipe_data = new Recipe();
        $blog_data = new User();
        $title  = $request->input('title');
        $caption  = $request->input('caption');
        $category = $request->input('category');
        $ingredients = $request->input('ingredients');
        $time = $request->input('time');
        $calories = $request->input('calories');
        $description = $request->input('description');

        $hasimage = $request->input('image');
        if ($hasimage){
            $fullFilename = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($fullFilename, PATHINFO_FILENAME);
            $fileExt = $request->file('image')->getClientOriginalExtension();
            $renamedFile =  $filename . "_" . time() . "." . $fileExt;
            $path = $request->file('image')->storeAs("public/covers", $renamedFile);
            $path = "storage/covers/".$renamedFile;
            
            $data = session('email');

            if (!$description){
                $update_recipe = Recipe::where('id', $id)
                        ->update(['title' => $title, 'caption'=>$caption, 'category'=>$category,
                        'ingredients'=>$ingredients, 'time'=>$time, 'calories'=>$calories, 
                        'image'=>$path]);
            }else{
                $update_recipe = Recipe::where('id', $id)
                    ->update(['title' => $title, 'caption'=>$caption, 'category'=>$category,
                    'ingredients'=>$ingredients, 'time'=>$time, 'calories'=>$calories, 
                    'description'=>$description, 'image'=>$path]);
            }
        }else{
            $data = session('email');

            if (!$description){
                $update_recipe = Recipe::where('id', $id)
                        ->update(['title' => $title, 'caption'=>$caption, 'category'=>$category,
                        'ingredients'=>$ingredients, 'time'=>$time, 'calories'=>$calories]);
            }else{
                $update_recipe = Recipe::where('id', $id)
                    ->update(['title' => $title, 'caption'=>$caption, 'category'=>$category,
                    'ingredients'=>$ingredients, 'time'=>$time, 'calories'=>$calories, 
                    'description'=>$description]);
            }
        }
        if($update_recipe) {
            return redirect('foodblog.check');
        }
        else{
            return redirect('editrecipeform');
        }
    }

    function delete_recipe($id){
        $recipe_data = new Recipe();
        $data = session('email');
        $blog_username = User::where('email', $data)
                ->value('blog_username');
        $fetch_blog_username = Recipe::where('id', $id)
                ->value('blog_username');
        if ($blog_username == $fetch_blog_username){
            $recipe_to_delete = Recipe::where('id', $id)->delete();
            if($recipe_to_delete){
                return redirect("foodblog.show")->with("success", "Post Deleted!");
            }else{
                return redirect('showfullrecipe');
            }
        }else{
            return redirect('restriction');
        }

        return redirect("foodblog.show")->with("success", "Post Deleted!");
    }

    function restriction(){
        echo 'no permission to edit or delete';
        // return view();
    }

    public function perform(Request $request){
        // $image_file = $request->File('image');
        // if ($image_file){
        // $image_path = $image_file->store('public/images');
        // }
        // $value = asset('storage/'.$image_path);
        // $file = Storage::put('donut/1', $image_file);
        // $contents = Storage::url($image_file);
        // $path = Storage::putFile('public', $request->file('avatar'));
        //  dd($value);
        //  echo '<a href="{{ $value }}">Lin/k</a>';
        // if ($image_path){
            // $this->pic($image_path);
        // return view('againtrial')->with('image', $image_path);
        // }else echo "try again";

    }

    // public function pic($image_path){
    //     // $value = 
    //     return view('againtrial');
    //     // ->with('image', $image_path);
    // }
}
