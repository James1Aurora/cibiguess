<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Badge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DashBadgeController extends Controller
{
    public function loadAllBadges(Request $request)
    {
        $query = Badge::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('title', 'LIKE', "%{$search}%")
                  ->orWhere('description', 'LIKE', "%{$search}%");
        }

        $badges = $query->paginate(25);
        return view('badge.badges', compact('badges'));
    }

    public function loadAddbadges()
    {
        return view('badge.add-badge');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
                'title' => 'required|string|max:255',
                'criteria' => 'required|string',
                'threshold' => 'required|string',
                'description' => 'required|string',
            ]);

            $image = $request->file('image');
            $image->storeAs('public/badges', $image->hashName());

            Badge::create([
                'image' => $image->hashName(),
                'title' => $request->title,
                'criteria' => $request->criteria,
                'threshold' => $request->threshold,
                'description' => $request->description,
            ]);

            return redirect()->route('badges')->with('success', 'Badge created successfully');

        } catch (\Exception $e) {
            return redirect()->route('add-badge')->with('fail', 'Error muncul ketika adding badge data: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $badge = Badge::findOrFail($id);

            $request->validate([
                'image' => 'sometimes|image|mimes:jpeg,jpg,png|max:2048',
                'title' => 'required|string|max:255',
                'criteria' => 'required|string',
                'threshold' => 'required|string',
                'description' => 'required|string',
            ]);

            if ($request->hasFile('image')) {
                if ($badge->image && Storage::exists('public/badges/' . $badge->image)) {
                    Storage::delete('public/badges/' . $badge->image);
                }
                $image = $request->file('image');
                $image->storeAs('public/badges', $image->hashName());

                $badge->update([
                    'image' => $image->hashName(),
                    'title' => $request->title,
                    'criteria' => $request->criteria,
                    'threshold' => $request->threshold,
                    'description' => $request->description,
                ]);
            } else {
                $badge->update([
                    'title' => $request->title,
                    'criteria' => $request->criteria,
                    'threshold' => $request->threshold,
                    'description' => $request->description,
                ]);
            }

            return redirect()->route('badges')->with('success', 'Badge updated successfully');
        } catch (\Exception $e) {
            return redirect()->route('edit-badge', $id)->with('fail', 'Error muncul ketika updating badge: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $badge = Badge::findOrFail($id);
            return view('badge.edit-badge', compact('badge'));
        } catch (\Exception $e) {
            return redirect()->route('badges')->with('fail', 'Error muncul ketika loading badge: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $badge = Badge::findOrFail($id);
            if ($badge->image && Storage::exists('public/badges/' . $badge->image)) {
                Storage::delete('public/badges/' . $badge->image);
            }
            $badge->delete();

            return redirect()->route('badges')->with('success', 'Badge deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('badges')->with('fail', 'Error muncul ketika menghapus badge: ' . $e->getMessage());
        }
    }
}