<?php

namespace App\Http\Controllers;

use App\Models\Schdule;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        return view('landingpage_2.BizLand.index');
    }

    public function information($id)
    {
        $infodetail =  Schdule::findOrFail($id);

        return view('landingpage_2.BizLand.information-detail', compact('infodetail'));
    }
}
