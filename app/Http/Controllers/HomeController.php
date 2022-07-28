<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()         /*this is index method, we are not taking any paramter and hence returning the view of home. now lets go to see the home view. */
    {
        return view('home');
    }
}
