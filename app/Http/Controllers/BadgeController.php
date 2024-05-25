<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\view;
use App\Models\Badge;
use Illuminate\Support\Facades\Storage;

class BadgeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $badges = Badge::all();
        $user = [
            "name" => "John Doe",
            "age" => 69
        ];

        return view('coba-crud.index', compact('badges', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            // Add validation rules for other fields if needed
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/badges', $image->hashName());

        Badge::create([
            'image' => $image->hashName(),
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('badge')->with('success', 'Badge created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find the badge by ID
        $badge = Badge::findOrFail($id);

        $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            // Add validation rules for other fields if needed
        ]);

        if ($request->hasFile('image')) {
            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/badges', $image->hashName());

            //delete old image
            Storage::delete('public/badges/'.$badge->image);

            $badge->update([
                'image' => $image->hashName(),
                'title' => $request->title,
                'description' => $request->description,
            ]);
        } else {
            $badge->update([
                'title' => $request->title,
                'description' => $request->description,

            ]);
        }

        return redirect()->route('badge')->with('success', 'Badge updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $badge = Badge::findOrFail($id);

        Storage::delete('public/badges/'.$badge->image);
        $badge->delete();

        return redirect()->route('badge')->with('success', 'Badge deleted successfully');
    }
}
