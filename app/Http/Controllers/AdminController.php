<?php
namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Display dashboard
    public function dashboard()
    {
        $songs = Song::all(); // Fetch all songs to display on the dashboard
        return view('admin.dashboard', compact('songs'));
    }

    // Show the Add Song page
    public function showAddSongPage()
    {
        return view('add-song'); // Return the add-song.blade.php page
    }

    // Handle Add Song form submission
    public function addSong(Request $request)
    {
        $request->validate([
            'artist' => 'required|string|max:255',
            'song' => 'required|string|max:255',
        ]);

        // Create a new song record
        Song::create([
            'Artist' => $request->artist,
            'Song' => $request->song,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Song added successfully!');
    }
}
