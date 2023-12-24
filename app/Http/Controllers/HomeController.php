<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Games;
use GuzzleHttp\Client;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $games = Games::all();
        return view('homepage', compact('games'));
    }
}
