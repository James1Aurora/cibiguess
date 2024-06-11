<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewHistory;

class LeaderboardController extends Controller
{
    public function leaderboard()
    {
        // Ambil data dari tabel new_histories
        $new_histories = NewHistory::orderBy('score', 'desc')->take(10)->get();

        // Kirim data ke tampilan leaderboard
        return view('leaderboard.index-leaderboard', compact('new_histories'));
    }
}
