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
use App\Models\ScoreIq;
use App\Models\ScorePersonal;
use App\Models\Stage;
use App\Models\Video;
use App\Models\Setting;
use Illuminate\Http\Request;

class BiodataTwoController extends Controller
{
    public function index()
    {
        $provinsi = DB::table('indonesia_provinces')->get();
        $kabupaten = DB::table('indonesia_cities')->get();
        $back = BiodataTwo::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->first();

        return view('front.pages.biodata.index', compact('provinsi', 'kabupaten', 'back'));
    }

    public function store(BiodataTwoRequest $request)
    {
        $users_id = Auth::user()->id;
        $tahun_ajaran_id = AcademyYear::where('is_active', true)->orderBy('id', 'desc')->pluck('id')->first();
        $stage_id = Stage::whereHas('academy_year', function ($query) {
            $query->where('is_active', true);
        })->orderBy('id', 'desc')->pluck('id')->first();

        $notif = Setting::get()->first();

        $biodata = BiodataTwo::where('academy_year_id', $tahun_ajaran_id)->where('user_id', $users_id)->first();

        if (!$biodata) {
            if (Auth::user()->BiodataOne->family == 'sangat-mampu') {
                $request->merge(['user_id' => $users_id, 'academy_year_id' => $tahun_ajaran_id, 'stage_id' => $stage_id, 'status' => null]);
                BiodataTwo::create($request->all());

                $data = [
                    'target' => Auth::user()->phone,
                    'message' => '*' . Auth::user()->name . '*, ' . $notif->complete_tahap1_sm

                ];
                sendMessage($data);
            } else {
                $request->merge(['user_id' => $users_id, 'academy_year_id' => $tahun_ajaran_id, 'stage_id' => $stage_id]);
                // dd($request->all());
                BiodataTwo::create($request->all());

                $data = [
                    'target' => Auth::user()->phone,
                    'message' => '*' . Auth::user()->name . '*, ' . $notif->complete_tahap1
                ];
                sendMessage($data);
            }
        } else {
            return redirect()->route('success');
        }

        return redirect()->route('success');
    }

    public function clone()
    {
        $back = BiodataTwo::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->first();

        $tahun_ajaran_id = AcademyYear::where('is_active', true)->orderBy('id', 'desc')->pluck('id')->first();
        $stage_id = Stage::whereHas('academy_year', function ($query) {
            $query->where('is_active', true);
        })->orderBy('id', 'desc')->pluck('id')->first();

        $notif = Setting::get()->first();

        if (Auth::user()->BiodataOne->family == 'sangat-mampu') {

            unset($back['id']);
            $back['academy_year_id'] = $tahun_ajaran_id;
            $back['stage_id'] = $stage_id;
            $back['status'] = null;

            BiodataTwo::create($back->toArray());

            $data = [
                'target' => Auth::user()->phone,
                'message' => '*' . Auth::user()->name . '*, ' . $notif->complete_tahap1_sm

            ];
            sendMessage($data);
        } else {
            unset($back['id']);
            $back['academy_year_id'] = $tahun_ajaran_id;
            $back['stage_id'] = $stage_id;
            $back['status'] = null;

            BiodataTwo::create($back->toArray());

            $data = [
                'target' => Auth::user()->phone,
                'message' => '*' . Auth::user()->name . '*, ' . $notif->complete_tahap1
            ];
            sendMessage($data);
        }

        return redirect()->route('success');
    }
}