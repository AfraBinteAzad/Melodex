<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function playSong($song)
    {
        $song = Song::where('Song', urldecode($song))->first(); 
        if ($song) {
            return view('playsong', ['song' => $song]); 
        }
        return redirect()->route('dashboard')->with('error', 'Song not found.');
    }
}

