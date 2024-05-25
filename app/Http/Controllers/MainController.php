<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use Illuminate\View\view;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index');
    }

    public function leaderboard()
    {
        return view('leaderboard.index');
    }

    public function donate()
    {
        return view('donate.index');
    }
}