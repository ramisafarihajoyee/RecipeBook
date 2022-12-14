<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Competition;
use App\Models\User;

class CompetitionController extends Controller
{

    function show(){
        return view('competition/form');
    }

    function profileshow($email){
        $list_fetch = User::where('email', $email)
                    ->get();
        $winner = Competition::where('email', $email)
                    ->get();
        return view('competition/profileshow', ['list' => $list_fetch, 'winner' => $winner]);
    }

    function result(){
        $sessiondata = session('email');  
        $result_fetch = Competition::where('position', '!=', '')
                        ->orderBy('competition_year', 'desc')
                        ->orderBy('position')->get();
        return view('competition/result', ['result_list' => $result_fetch]);
    }

    function store(Request $request){

        $name  = $request->input('name');
        $email  = $request->input('email');
        $address = $request->input('address');
        $phone = $request->input('phone');
        $season = $request->input('season');
        $year = $request->input('year');
        $place = $request->input('place');

        $value = Competition::insert(['name'=>$name, 'email'=>$email, 'address'=>$address,
        'phone'=> $phone, 'competition_season'=>$season, 'competition_year'=>$year, 'competition_place'=>$place]); 

        if($value) {
            return redirect('dashboard');
        }
        else{
            echo "try again";
        }
    }

}
