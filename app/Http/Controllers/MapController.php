<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MiniMap;
use App\Models\Question;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function loadAllMaps(Request $request)
    {
        $query = Question::query();
        $miniMapCount = MiniMap::count(); // Menghitung jumlah MiniMap

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('title', 'LIKE', "%{$search}%")
                  ->orWhere('description', 'LIKE', "%{$search}%");
        }

        $maps = $query->get();
        return view('maps.daftar-maps', compact('maps', 'miniMapCount'));
    }

    public function loadAddMaps()
    {
        $miniMaps = MiniMap::all();

        return view('maps.add-maps', compact('miniMaps'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'difficulty' => 'required|string',
            'building' => 'required|numeric',
            'spotImage' => 'required|image|mimes:jpeg,png,jpg|max:3072',
            // 'mapImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000',
            'answerX' => 'required|numeric|max:350|min:0',
            'answerY' => 'required|numeric|max:250|min:0',
        ]);

        try {
            $spotimageName = time() . '.' . $request->file('spotImage')->getClientOriginalExtension();
            $request->file('spotImage')->move(public_path('images/maps/'), $spotimageName);

            // $imageName = time() . '.' . $request->file('mapImage')->getClientOriginalExtension();
            // $request->file('mapImage')->move(public_path('images/maps'), $imageName);

            $maps = new Question();
            $maps->difficulty = $request->input('difficulty');
            $maps->buildingId = $request->input('building');
            $maps->spotImage = $spotimageName;
            $maps->answerX = $request->input('answerX');
            $maps->answerY = $request->input('answerY');
            // $maps->building = $request->input('building');
            // $maps->mapImage = $imageName;
            $maps->save();

            return redirect()->route('daftar-maps')->with('success', 'Map data added berhasil');
        } catch (\Exception $e) {
            return redirect()->route('add-maps')->with('fail', 'Error muncul ketika adding map data: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'difficulty' => 'required|string',
            'building' => 'required|numeric',
            'spotImage' => 'image|mimes:jpeg,png,jpg|max:3072',
            // 'mapImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000',
            'answerX' => 'required|numeric|max:350|min:0',
            'answerY' => 'required|numeric|max:250|min:0',
        ]);

        // $request->validate([
        //     'difficulty' => 'string',
        //     'building' => 'string',
        //     'spotImage' => 'image|mimes:jpeg,png,jpg,gif|max:10000',
        //     'mapImage' => 'image|mimes:jpeg,png,jpg,gif|max:10000',
        //     'answerX' => 'numeric',
        //     'answerY' => 'numeric',
        // ]);

        try {
            $maps = Question::findOrFail($id);

            // Handle mapImage upload
            // if ($request->hasFile('mapImage')) {
            //     // Hapus file lama jika ada
            //     if ($maps->mapImage && file_exists(public_path('images/maps' . $maps->mapImage))) {
            //         unlink(public_path('images/maps' . $maps->mapImage));
            //     }
            //     // Pindahkan file baru ke lokasi yang sama dengan file lama
            //     $maps->mapImage = $request->file('mapImage')->getClientOriginalName();
            //     $request->file('mapImage')->move(public_path('images/maps'), $maps->mapImage);
            // }

            // Handle spotImage upload
            if ($request->hasFile('spotImage')) {
                // Hapus file lama jika ada
                if ($maps->spotImage && file_exists(public_path('images/maps/' . $maps->spotImage))) {
                    unlink(public_path('images/maps/' . $maps->spotImage));
                }
                // Pindahkan file baru ke lokasi yang sama dengan file lama
                $maps->spotImage = $request->file('spotImage')->getClientOriginalName();
                $request->file('spotImage')->move(public_path('images/maps/'), $maps->spotImage);
            }

            $maps->difficulty = $request->difficulty;
            $maps->buildingId = $request->building;
            $maps->answerX = $request->answerX;
            $maps->answerY = $request->answerY;
            $maps->save();

            return redirect()->route('daftar-maps')->with('success', 'Map data updated berhasil');
        } catch (\Exception $e) {
            return redirect()->route('edit-maps', $id)->with('fail', 'Error muncul ketika updating map data: ' . $e->getMessage());
        }
    }


    public function edit($id)
    {
        $miniMaps = MiniMap::all();

        try {
            $map = Question::findOrFail($id);
            return view('maps.edit-maps', compact('map', 'miniMaps'));
        } catch (\Exception $e) {
            return redirect()->route('daftar-maps')->with('fail', 'Error muncul ketika loading map: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $maps = Question::findOrFail($id);

            // Hapus file gambar mapImage jika ada
            if ($maps->spotImage) {
                $spotImagePath = public_path('images/maps/' . $maps->spotImage);
                if (file_exists($spotImagePath)) {
                    unlink($spotImagePath);
                }
            }

            // Hapus file gambar spotImage jika ada
            // if ($maps->spotImage) {
            //     $spotImagePath = public_path('images/maps' . $maps->spotImage);
            //     if (file_exists($spotImagePath)) {
            //         unlink($spotImagePath);
            //     }
            // }

            $maps->delete();

            return redirect()->route('daftar-maps')->with('success', 'Map deleted berhasil');
        } catch (\Exception $e) {
            return redirect()->route('daftar-maps')->with('fail', 'Error muncul ketika deleting map: ' . $e->getMessage());
        }
    }
}