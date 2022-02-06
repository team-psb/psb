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

    public function information($title)
    {
        $title_slug =  Str::slug($title, ' ');
        $infodetail =  Schdule::where('title', $title_slug.'.')->get()->first();
        // dd($infodetail);
        
        return view('landingpage.information_detail', compact('infodetail'));
    }
}
