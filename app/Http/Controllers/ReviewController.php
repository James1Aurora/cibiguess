<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Review::latest()->take(8)->get();

        return view('reviews.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reviews.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rating' => 'required|integer|between:1,5',
            'comment' => 'required|string|min:3',
        ]);

        $review = Review::where('userId', 2)->first(); // auth()->user()->id

        if ($review) {
            return redirect()->route('review')->with('error', 'You already submitted a review');
        }

        Review::create([
            'userId' => 2, // auth()->user()->id,
            'comment' => $request->comment,
            'rating' => $request->rating,
        ]);

        return redirect()->route('review')->with('success', 'Review created successfully');
    }
}