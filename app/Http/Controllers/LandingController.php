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

    public function information($title, $id)
    {
        $title_slug =  Str::slug($title, ' ');
        $infodetail =  Schdule::where('title', $title_slug.'.')->where('id', $id)->get()->first();
        
        return view('landingpage.information_detail', compact('infodetail'));
    }
}
