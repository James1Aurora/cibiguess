<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Maps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

            return redirect()->route('daftar-maps')->with('success', 'Map data added successfully');
        } catch (\Exception $e) {
            return redirect()->route('add-maps')->with('fail', 'Error occurred while adding map data: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
            $maps = Maps::findOrFail($id); 
            $request->validate([
                'difficulty' => 'required|string',
                'building' => 'required|string',
                'spotImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000',
                'mapImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000',
                'answerX' => 'required|numeric',
                'answerY' => 'required|numeric',
            ]);


        try {


            if ($request->hasFile('mapImage')) {
                $imageName = time() . '.' . $request->file('mapImage')->getClientOriginalExtension();
                $request->file('mapImage')->move(public_path('images'), $imageName);
                $maps->mapImage = $imageName; 
            }

            if ($request->hasFile('spotImage')) {
                $imageName = time() . '.' . $request->file('spotImage')->getClientOriginalExtension();
                $request->file('spotImage')->move(public_path('images'), $imageName);
                $maps->spotImage = $spotimageName; 
            }

            $update_map = Maps::where($request->id)->update([
                'difficulty' => $request->difficulty,
                'building' => $request->building,
                'spotImage'=> $request->spotImage,
                'mapImage' => $imageName,
                'answerX' => $request->answerX,
                'answerY' => $request->answerY,
                
            ]);

            return redirect()->route('/daftar-maps')->with('success', 'Map data updated successfully');
        } catch (\Exception $e) {
            return redirect()->route('/edit-maps', $id)->with('fail', 'Error occurred while updating map data: ' . $e->getMessage());
        }
    }

    
    public function edit($id)
    {
        try {
            $map = Maps::findOrFail($id); // Ambil data peta yang akan diedit dari database
            return view('maps.edit-maps', compact('map')); // Melewatkan data peta ke tampilan blade
        } catch (\Exception $e) {
            return redirect()->route('daftar-maps')->with('fail', 'Error occurred while loading map: ' . $e->getMessage());
        }
    }


    public function destroy($id)
    {
        try {
            Maps::destroy($id);
            return redirect()->route('daftar-maps')->with('success', 'Map deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('daftar-maps')->with('fail', 'Error occurred while deleting map: ' . $e->getMessage());
        }
    }
}

?>
