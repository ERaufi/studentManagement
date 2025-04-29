<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SessionDemoController extends Controller
{
    public function index()
    {
        // add item to session
        // session(['favorite_color' => 'blue']);

        $session = session('favorite_color');


        // session()->flash('Status', 'You visted a new page');

        // session()->forget('favorite_color');

        session()->flush();

        return session()->all();
    }
}
