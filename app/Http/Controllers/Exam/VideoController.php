<?php

namespace App\Http\Controllers\Exam;

use App\Http\Controllers\Controller;
use App\Models\AcademyYear;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Stage;

class VideoController extends Controller
{
    public function index()
    {
        return view('front.pages.video.index');
    }


    public function videoStore(Request $request)
    {
        $request->validate(['url' => 'required']);
        $tahun_ajaran=AcademyYear::where('is_active', '=', 1)->orderBy('id', 'desc')->pluck('id')->first();
        $stage_id = Stage::whereHas('academy_year', function($query){
            $query->where('is_active', true);
        })->orderBy('id', 'desc')->pluck('id')->first();

        $request->merge(['user_id'=>Auth::user()->id, 'stage_id' => $stage_id, 'academy_year_id'=>$tahun_ajaran]);
        Video::create($request->all());

        return redirect()->route('success');
    }
}