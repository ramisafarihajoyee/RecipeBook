<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Notebook;
use App\Models\Recipe;

class NotebookController extends Controller
{
    //
    function index(){
        $sessiondata = session('email');  
        $notes = Notebook::where('email', $sessiondata)
                ->get();
        return view('notebook/show', ['notes' => $notes]);
    }

    function show(){
        return view('notebook/create');
    }

    function create(Request $request){
        $title  = $request->input('title');
        $description  = $request->input('description');

        $email = session('email');

        $value = Notebook::insert(['title'=>$title, 'description'=>$description, 'email'=>$email]);
        if($value == 0){
            return redirect('notebook/create');
        }else{
            return redirect('notebook/show'); 
        }
    }

    function delete($id){

        $email = session('email');
        $fetch_email = Notebook::where('id', $id)
                ->value('email');
        if ($email == $fetch_email){
            $note_to_delete = Notebook::where('id', $id)->delete();
            if($note_to_delete){
                return redirect("notebook/show");
            }else{
                echo "try again";
            }
        }else{
            return redirect('restriction');
        }
    }

    function restriction(){
        echo 'no permission to edit or delete';
        // return view();
    }

    function view($id){
        $fetch_note = Notebook::where('id', $id)
                ->get();
        return view('notebook/view', ['note' => $fetch_note]);
    }

    // function saveasnote($id){
    //     $fetch_recipe = Recipe::where('id', $id)->get();
    //     return view('notebook/view', ['recipe_note' => $fetch_recipe]);
    // }

    public function editfetch($id){
        $sessiondata = session('email');
        $fetch_note = Notebook::where('id', $id)
                    ->where('email', $sessiondata)
                    ->get();
        return view('/notebook/edit', ['note' => $fetch_note]);
    }


    function edit(Request $request, $id){

        $title  = $request->input('title');
        $description = $request->input('description');

        $sessiondata = session('email');

        if($title && $description){
            $update_note = Notebook::where('id', $id)
            ->update(['title' => $title, 'description'=>$description]);
        }
        else if(!$title && $description){
            $update_note = Notebook::where('id', $id)
            ->update(['description'=>$description]);
        }
        else if($title && !$description){
            $update_note = Notebook::where('id', $id)
            ->update(['title' => $title]);
        }
        if($update_note) {
            return redirect('notebook/show');
        }
        else{
            return redirect('notebook/note.edit');
        }
    }

}
