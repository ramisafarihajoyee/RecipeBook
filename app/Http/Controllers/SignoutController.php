<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SignoutController extends Controller
{
    //perform method
    public function perform()
    {
        Session::flush();

        return redirect('/');
    }
}
