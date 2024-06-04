<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Maps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MapController extends Controller
{
    public function loadAllMaps()
    {
        $maps = Maps::all();
        return view('maps.daftar-maps', compact('maps'));
    }

    public function loadAddMaps()
    {
        return view('maps.add-maps');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'difficulty' => 'required|string',
                'building' => 'required|string',
                'spotImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000',
                'mapImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000',
                'answerX' => 'required|numeric',
                'answerY' => 'required|numeric',
            ]);


            $spotimageName = time() . '.' . $request->file('spotImage')->getClientOriginalExtension();
            $request->file('spotImage')->move(public_path('images'), $spotimageName);

            $imageName = time() . '.' . $request->file('mapImage')->getClientOriginalExtension();
            $request->file('mapImage')->move(public_path('images'), $imageName);


            $maps = new Maps();
            $maps->difficulty = $request->input('difficulty');
            $maps->building = $request->input('building');
            $maps->spotImage = $spotimageName;
            $maps->mapImage = $imageName; 
            $maps->answerX = $request->input('answerX');
            $maps->answerY = $request->input('answerY');
            $maps->save();

            return redirect()->route('daftar-maps')->with('success', 'Map data added berhasil');
        } catch (\Exception $e) {
            return redirect()->route('add-maps')->with('fail', 'Error muncul ketika adding map data: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $maps = Maps::findOrFail($id); 
            $request->validate([
                'difficulty' => 'string',
                'building' => 'string',
                'spotImage' => 'image|mimes:jpeg,png,jpg,gif|max:10000',
                'mapImage' => 'image|mimes:jpeg,png,jpg,gif|max:10000',
                'answerX' => 'numeric',
                'answerY' => 'numeric',
            ]);

        // Handle mapImage upload
        if ($request->hasFile('mapImage')) {
            // Hapus file lama jika ada
            if ($maps->mapImage && file_exists(public_path('images/' . $maps->mapImage))) {
                unlink(public_path('images/' . $maps->mapImage));
            }
            // Pindahkan file baru ke lokasi yang sama dengan file lama
            $maps->mapImage = $request->file('mapImage')->getClientOriginalName();
            $request->file('mapImage')->move(public_path('images'), $maps->mapImage);
        }

        // Handle spotImage upload
        if ($request->hasFile('spotImage')) {
            // Hapus file lama jika ada
            if ($maps->spotImage && file_exists(public_path('images/' . $maps->spotImage))) {
                unlink(public_path('images/' . $maps->spotImage));
            }
            // Pindahkan file baru ke lokasi yang sama dengan file lama
            $maps->spotImage = $request->file('spotImage')->getClientOriginalName();
            $request->file('spotImage')->move(public_path('images'), $maps->spotImage);
        }

            $maps->difficulty = $request->difficulty;
            $maps->building = $request->building;
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
        try {
            $map = Maps::findOrFail($id); 
            return view('maps.edit-maps', compact('map')); 
        } catch (\Exception $e) {
            return redirect()->route('daftar-maps')->with('fail', 'Error muncul ketika loading map: ' . $e->getMessage());
        }
    }



    public function destroy($id)
    {
        try {
            $maps = Maps::findOrFail($id);
    
            // Hapus file gambar mapImage jika ada
            if ($maps->mapImage) {
                $mapImagePath = public_path('images/' . $maps->mapImage);
                if (file_exists($mapImagePath)) {
                    unlink($mapImagePath);
                }
            }
    
            // Hapus file gambar spotImage jika ada
            if ($maps->spotImage) {
                $spotImagePath = public_path('images/' . $maps->spotImage);
                if (file_exists($spotImagePath)) {
                    unlink($spotImagePath);
                }
            }
    
            $maps->delete();
    
            return redirect()->route('daftar-maps')->with('success', 'Map deleted berhasil');
        } catch (\Exception $e) {
            return redirect()->route('daftar-maps')->with('fail', 'Error muncul ketika deleting map: ' . $e->getMessage());
        }
    }



    
}

?>
