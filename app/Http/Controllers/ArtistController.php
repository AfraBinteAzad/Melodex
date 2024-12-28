<?php
// app/Http/Controllers/ArtistController.php

namespace App\Http\Controllers;

use App\Models\Song;  // Make sure the Song model is included

class ArtistController extends Controller
{
    public function index()
    {
        // Fetch artists and their songs from the database
        $artists = Song::select('Artist')->distinct()->get();

        // For each artist, get their songs
        $songsByArtist = [];
        foreach ($artists as $artist) {
            $songsByArtist[$artist->Artist] = Song::where('Artist', $artist->Artist)->get();
        }

        return view('songslist', compact('songsByArtist'));
    }
}
