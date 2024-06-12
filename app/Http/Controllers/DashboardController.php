<?php

// app/Http/Controllers/DashboardController.php
namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // GET HISTORY BY 1 MONTH BEFORE, CURRENT MONTH, AND 1 MONTH AFTER
        $histories = History::where('datePlayed', '>=', now()->subMonth())
                            ->where('datePlayed', '<=', now()->addMonth())
                            ->get();

        $activeUsers = [
            'first' => $histories->where('datePlayed', '>=', now()->subMonth())
                                 ->where('datePlayed', '<', now()->startOfMonth())
                                 ->count(),
            'mid' => $histories->where('datePlayed', '>=', now()->startOfMonth())
                               ->where('datePlayed', '<=', now()->endOfMonth())
                               ->count(),
            'end' => $histories->where('datePlayed', '>', now()->endOfMonth())
                               ->where('datePlayed', '<=', now()->addMonth())
                               ->count(),
        ];

        $monthLabels = [
            'before' => now()->subMonth()->format('M'),
            'current' => now()->format('M'),
            'after' => now()->addMonth()->format('M'),
        ];

        // GET AVERAGE SCORE BY MODES, EASY, MEDIUM AND HARD
        $avgScore = [
            'easy' => $histories->where('difficulty', 'easy')->avg('score') ?? 0,
            'medium' => $histories->where('difficulty', 'medium')->avg('score') ?? 0,
            'hard' => $histories->where('difficulty', 'hard')->avg('score') ?? 0,
        ];

        return view('admin.index', compact('user', 'activeUsers', 'monthLabels', 'avgScore'));
    }
}