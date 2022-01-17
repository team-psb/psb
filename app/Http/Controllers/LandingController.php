<?php

namespace App\Http\Controllers;

use App\Models\Schdule;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        return view('landingpage.index');
    }

    public function information($id)
    {
        $infodetail =  Schdule::findOrFail($id);

        return view('landingpage.information_detail', compact('infodetail'));
    }

    // public function otp()
    // {
    //     return view('landingpage.otp');
    // }
}
