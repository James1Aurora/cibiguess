<?php

namespace App\Http\Controllers;

use App\Models\MiniMap;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class MiniMapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $minimaps = MiniMap::paginate(25);

        return view('minimaps.index', compact('minimaps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('minimaps.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:png|max:4096',
            'name' => 'required|string|max:100',
            'building' => 'required|string|max:150',
        ]);

        try {
            $image = $request->file('image');
            $imageName = $image->hashName();
            $image->storeAs('public/minimaps', $imageName);
            // $image = $request->file('image');
            // $image->move(public_path('images/maps/'), $imageName);

            MiniMap::create([
                'name' => $request->name,
                'image' => $imageName,
                'building' => $request->building,
            ]);

            return redirect()->route('minimaps')->with('success', 'Mini Map created successfully');
        } catch (\Exception $e) {
            // Log error for debugging
            Log::error('Error creating Mini Map: ' . $e->getMessage());

            return redirect()->route('minimaps')->with('error', 'Failed to create Mini Map');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $miniMap = MiniMap::find($id);
        return view('minimaps.edit', compact('miniMap'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' => 'image|mimes:png|max:4096',
            'name' => 'string|max:100',
            'building' => 'string|max:150',
        ]);

        DB::beginTransaction();

        try {
            $miniMap = MiniMap::find($id);

            if (!$miniMap) {
                throw new \Exception('MiniMap not found.');
            }

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = $image->hashName();
                $image->storeAs('public/minimaps', $imageName);

                // Remove the old image if it exists
                if ($miniMap->image && Storage::exists('public/minimaps/' . $miniMap->image)) {
                    Storage::delete('public/minimaps/' . $miniMap->image);
                }

                $miniMap->image = $imageName;
            }

            if ($request->filled('name')) {
                $miniMap->name = $request->name;
            }
            if ($request->filled('building')) {
                $miniMap->building = $request->building;
            }

            $miniMap->save();

            DB::commit();

            return redirect()->route('minimaps')->with('success', 'Mini Map updated successfully');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error updating Mini Map: ' . $e->getMessage());

            return redirect()->route('minimaps')->with('error', 'Failed to update Mini Map');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();

            $miniMap = MiniMap::find($id);
            // Storage::delete('public/images/maps/' . $miniMap->image);
            // $imagePath = public_path('images/maps/' . $miniMap->image);
            if ($miniMap->image && Storage::exists('public/minimaps/' . $miniMap->image)) {
                Storage::delete('public/minimaps/' . $miniMap->image);
            }
            $miniMap->delete();

            DB::commit();
            // RETURN JSON
            return response()->json(['status' => 'success', 'message' => 'Mini Map deleted successfully'], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => 'error', 'message' => 'Failed to delete Mini Map'], 500);
        }
    }
}