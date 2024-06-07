<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\History;
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
        // GET HISTORY PER-WEEK
        $histories = History::whereMonth('created_at', '=', date('m'))
            ->orderBy('score', 'desc')
            ->get()
            ->groupBy('userId')
            ->map(function ($group) {
                return $group->first();
            })
            ->values()
            ->take(10);

        return view('leaderboard.index', compact('histories'));
    }

    public function donate()
    {
        return view('donate.index');
    }
}