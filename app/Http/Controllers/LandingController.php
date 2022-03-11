<?php

namespace App\Http\Controllers;

use App\Models\Schdule;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LandingController extends Controller
{
    public function index()
    {
        return view('landingpage.index');
    }

    public function information($id)
    {
        // $infodetail =  Schdule::where('slug', $slug)->first();
        $infodetail =  Schdule::find($id);
        
        return view('landingpage.information_detail', compact('infodetail'));
    }
}
