<?php

namespace App\Http\Controllers\Exam;

use App\Http\Controllers\Controller;
use App\Http\Requests\BiodataTwoRequest;
use App\Models\AcademyYear;
use App\Models\BiodataTwo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $request->merge(['user_id' => $users_id, 'academy_year_id' => $tahun_ajaran_id, 'stage_id' => $stage_id]);
        BiodataTwo::create($request->all());

        return redirect()->route('success');
    }
}