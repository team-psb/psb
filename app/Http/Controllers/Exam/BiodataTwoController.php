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
        $tahun_ajaran_id = AcademyYear::where('is_active', '1')->pluck('id')->first();
        $stage_id = AcademyYear::where('stage_id', '4')->pluck('id')->first();
        
        if (BiodataOne::where('user_id', $users_id)->where('family', 'sangat-mampu')) {
            $request->merge(['user_id' => $users_id, 'academy_year_id' => $tahun_ajaran_id, 'stage_id' => $stage_id, 'status' => 'lolos']);
        }else{
            $request->merge(['user_id' => $users_id, 'academy_year_id' => $tahun_ajaran_id, 'stage_id' => $stage_id]);
        }
        BiodataTwo::create($request->all());

        if (BiodataOne::where('user_id', $users_id)->where('family', 'sangat-mampu')) {
            Score::create([
                'user_id' => $users_id,
                'academy_year_id' => $tahun_ajaran_id,
                'score_question_iq' => 0,
                'score_question_personal' => 0,
                'status' => 'lolos'
            ]);
            Video::create([
                'user_id' => $users_id,
                'academy_year_id' => $tahun_ajaran_id,
                'url' => 'url',
                'status' => 'lolos'
            ]);
            Interview::create([
                'user_id' => $users_id,
                'academy_year_id' => $tahun_ajaran_id,
                'status' => null
            ]);
        }

        return redirect()->route('success');
    }
}