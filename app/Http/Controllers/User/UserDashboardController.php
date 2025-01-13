<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\AcademyYear;
use App\Models\BiodataOne;
use App\Models\BiodataTwo;
use App\Models\Pass;
use App\Models\Qna;
use App\Models\Schdule;
use App\Models\Score;
use App\Models\ScoreIq;
use App\Models\ScorePersonal;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class UserDashboardController extends Controller
{
    public function index(){
        $tahun_ajaran = AcademyYear::where('is_active', true)->orderBy('id','desc')->first()->id;

        $data = BiodataOne::where('academy_year_id', $tahun_ajaran)->with(['academy_year' => function($query){
            $query->where('is_active', true);
        }]);

        $gelombang = AcademyYear::where('is_active', 1)->pluck('stage_id');

        $biodata1 = BiodataOne::where('academy_year_id', $tahun_ajaran)->where('user_id', '=', Auth::user()->id)->first();
        $tahap1 = BiodataTwo::where('academy_year_id', $tahun_ajaran)->where('user_id', '=', Auth::user()->id)->first();
        $tahap2 = ScoreIq::where('academy_year_id', $tahun_ajaran)->where('user_id', '=', Auth::user()->id)->first();
        $tahap3 = ScorePersonal::where('academy_year_id', $tahun_ajaran)->where('user_id', '=', Auth::user()->id)->first();
        $tahap4 = Video::where('academy_year_id', $tahun_ajaran)->where('user_id', '=', Auth::user()->id)->first();
        $tahap5 = Pass::where('academy_year_id', $tahun_ajaran)->where('user_id', '=', Auth::user()->id)->first();
        $schdules = Schdule::orderBy('created_at', 'desc')->get();
        $qna    = Qna::first();

        return view('front.index', compact('biodata1', 'tahap1', 'tahap2', 'tahap3', 'tahap4', 'tahap5', 'schdules', 'qna', 'data', 'tahun_ajaran'));
    }

    public function profile()
    {
        $tahun_ajaran = AcademyYear::where('is_active', true)->orderBy('id','desc')->first()->id;

        $tahap1 = BiodataTwo::where('academy_year_id', $tahun_ajaran)->where('user_id', '=', Auth::user()->id)->first();
        $profile = BiodataOne::where('academy_year_id', $tahun_ajaran)->firstWhere('user_id', Auth::user()->id);

        return view('front.pages.profile.index', compact('profile', 'tahap1'));
    }

    public function qna()
    {
        $qna = Qna::get();

        return view('front.pages.qna.index', compact('qna'));
    }

    public function information()
    {
        $informations = Schdule::orderBy('id', 'desc')->get();

        return view('front.pages.information.index', compact('informations'));
    }

    public function information_detail($id)
    {
        // $information =  Schdule::where('slug', $slug)->first();
        $information =  Schdule::find($id);

        return view('front.pages.information.info_detail', compact('information'));
    }
}