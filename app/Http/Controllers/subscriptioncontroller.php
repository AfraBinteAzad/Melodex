<?php
namespace App\Http\Controllers;

use App\Models\Package;

class SubscriptionController extends Controller
{
    public function show()
    {
        $packages = Package::all();
        return view('subscription', compact('packages'));
    }
}