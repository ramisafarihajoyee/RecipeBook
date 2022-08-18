<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\User;

class AddrecipeController extends Controller
{
    //show method
    function show(){
        return view('addrecipe');
    }

    //blog recipe store method
    public function store(Request $request){

        $recipe_data = new Recipe();
        $blog_data = new User();

        $title  = $request->input('title');
        $caption  = $request->input('caption');
        $category = $request->input('category');
        $ingredients = $request->input('ingredients');
        $time = $request->input('time');
        $calories = $request->input('calories');
        $description = $request->input('description');


        //------- handle the image upload
        //get the file name
        //this is the $request file we got from the POST
        $fullFilename = $request->file('image')->getClientOriginalName();
        //get the just the name
        $filename = pathinfo($fullFilename, PATHINFO_FILENAME);
        //get the extension
        $fileExt = $request->file('image')->getClientOriginalExtension();
        //----  get the file ready to be stored
        $renamedFile =  $filename . "_" . time() . "." . $fileExt;
        $path = $request->file('image')->storeAs("public/covers", $renamedFile);
        ///////////////////////////////


        // if ($request->file('image') == null) {
        //     $image_file = "";
        // }else{
        //    $image_file = $request->file('image')->store('/public/images');  
        // }
        // $image_file = $request->hasFile('image')->store('../images/');
        // if ($image_file){
        // $image_path = $image_file->store('../images/');
        // }else{
        //     $image_path = "";
        // }
        // $image_path = asset('storage/'.$image_file);

            // $time=time();
        $data = session('email');
        $value = User::where('email', $data)
                ->value('blog_username');
        $path = "storage/covers/".$renamedFile;
        $is_success = Recipe::insert(['title'=>$title, 'caption'=>$caption, 'category'=>$category,
                    'ingredients'=>$ingredients, 'time'=>$time, 'calories'=>$calories, 
                    'description'=>$description, 'blog_username'=>$value, 'image'=>$path
        ]);

        if($is_success) {
            return redirect('foodblog.show')->with("success", "Post Deleted!");
        }
        else{
            return redirect('addrecipe');
        }
    }
}
