<?php

// app/Http/Controllers/AdminSongController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminSongController extends Controller
{
    public function index()
    {
        $artists = DB::table('songs')
            ->select('Artist', DB::raw('GROUP_CONCAT(Song SEPARATOR ", ") as Songs'))
            ->groupBy('Artist')
            ->get();

        $songs = DB::table('songs')->get();

        return view('admin.dashboard', compact('artists', 'songs'));
    }

    public function store(Request $request)
{
    // Validate the request data
    $request->validate([
        'artist' => 'required|string|max:255',
        'song' => 'required|string|max:255',
        'album' => 'nullable|string|max:255',
        'mp3_file' => 'required|mimes:mp3|max:10240', // 10MB max size for mp3
    ]);

    // Check if the file was uploaded successfully
    if ($request->hasFile('mp3_file') && $request->file('mp3_file')->isValid()) {
        // Store the MP3 file in the 'public/music' directory and get its path
        $filePath = $request->file('mp3_file')->store('music', 'public');
        
        // Insert the song data into the database
        DB::table('songs')->insert([
            'Artist' => $request->artist,
            'Song' => $request->song,
            'Album' => $request->album ?? null,  // If no album is provided, set it to null
            'mp3_file' => $filePath,  // Store the file path in the database
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Song added successfully.');
        }
    
        // If no valid file is uploaded, return with an error message
        return redirect()->route('admin.dashboard')->with('error', 'Failed to upload MP3 file.');
    }   

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:songs,id',
            'artist' => 'required|string|max:255',
            'song' => 'required|string|max:255',
        ]);

        DB::table('songs')->where('id', $request->id)->update([
            'Artist' => $request->artist,
            'Song' => $request->song,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Song updated successfully.');
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:songs,id',
        ]);

        DB::table('songs')->where('id', $request->id)->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Song deleted successfully.');
    }
}
