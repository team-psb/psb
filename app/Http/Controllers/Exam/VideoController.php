<?php

namespace App\Http\Controllers\Exam;

use App\Http\Controllers\Controller;
use App\Models\AcademyYear;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    public function index()
    {
        return view('front.pages.video.index');
    }


    public function videoStore(Request $request)
    {
        $request->validate(['url' => 'required']);
        $tahun_ajaran=AcademyYear::where('is_active', '=', 1)->orderBy('created_at', 'desc')->pluck('id')->first();
        $request->merge(['user_id'=>Auth::user()->id, 'academy_year_id'=>$tahun_ajaran]);
        Video::create($request->all());

        return redirect()->route('success');
    }
}