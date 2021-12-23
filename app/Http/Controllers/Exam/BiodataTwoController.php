<?php

namespace App\Http\Controllers\Exam;

use App\Http\Controllers\Controller;
use App\Http\Requests\BiodataTwoRequest;
use App\Models\AcademyYear;
use App\Models\BiodataTwo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\BiodataOne;
use App\Models\Interview;
use App\Models\Score;
use App\Models\Stage;
use App\Models\Video;

class BiodataTwoController extends Controller
{
    public function index()
    {
        $provinsi = DB::table('indonesia_provinces')->get();
        $kabupaten = DB::table('indonesia_cities')->get();
    
        return view('front.pages.biodata.index',compact('provinsi','kabupaten'));
    }

    public function store(BiodataTwoRequest $request){
        $users_id = Auth::user()->id;
        $tahun_ajaran_id = AcademyYear::where('is_active', true)->orderBy('id', 'desc')->pluck('id')->first();
        $stage_id = Stage::whereHas('academy_year', function($query){
            $query->where('is_active', true);
        })->orderBy('id', 'desc')->pluck('id')->first();

        if (Auth::user()->BiodataOne->family == 'sangat-mampu') {
            $request->merge(['user_id' => $users_id, 'academy_year_id' => $tahun_ajaran_id, 'stage_id' => $stage_id, 'status' => 'lolos']);
            BiodataTwo::create($request->all());

            Score::create([
                'user_id' => $users_id,
                'stage_id' => $stage_id,
                'academy_year_id' => $tahun_ajaran_id,
                'score_question_iq' => 0,
                'score_question_personal' => 0,
                'status' => 'lolos'
            ]);
            Video::create([
                'user_id' => $users_id,
                'stage_id' => $stage_id,
                'academy_year_id' => $tahun_ajaran_id,
                'url' => 'url',
                'status' => 'lolos'
            ]);
            Interview::create([
                'user_id' => $users_id,
                'stage_id' => $stage_id,
                'academy_year_id' => $tahun_ajaran_id,
                'status' => null
            ]);
        }else{
            $request->merge(['user_id' => $users_id, 'academy_year_id' => $tahun_ajaran_id, 'stage_id' => $stage_id]);
            // dd($request->all());
            BiodataTwo::create($request->all());
        }

        return redirect()->route('success');
    }
}