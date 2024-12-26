<?php
namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showDashboard()
    {
        return view('dashboard'); 
    }

    public function search(Request $request)
    {
        $query = $request->query('query');
        
        $results = Song::where('song', 'LIKE', "%{$query}%")
                        ->orWhere('artist', 'LIKE', "%{$query}%")
                        ->orWhere('album', 'LIKE', "%{$query}%")
                        ->get();

        return view('dashboard', ['results' => $results]); 
    }
    public function index()
    {
        
        return view('dashboard');
    }
}
