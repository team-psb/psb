<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\AcademyYear;
use App\Models\BiodataOne;
use App\Models\BiodataTwo;
use App\Models\Pass;
use App\Models\Schdule;
use App\Models\Score;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index(){
        $data = BiodataOne::with(['academy' => function($query){
            $query->where('year', date('Y'));
        }]);

        // $registrans = $data->where('academy', '!=', null)->count();

        $gelombang = AcademyYear::where('is_active', 1)->pluck('stage_id');

        $biodata1 = BiodataOne::where('user_id', '=', Auth::user()->id)->first(); 
        $tahap1 = BiodataTwo::where('user_id', '=', Auth::user()->id)->first();
        $tahap2 = Score::where('user_id', '=', Auth::user()->id)->first();
        $tahap3 = Video::where('user_id', '=', Auth::user()->id)->first();
        $tahap4 = Pass::where('user_id', '=', Auth::user()->id)->first();
        $schdule = Schdule::orderBy('created_at', 'desc')->take(4)->get();
        
        return view('front.index', compact('biodata1', 'tahap1', 'tahap2', 'tahap3', 'tahap4', 'schdule'));
    }
}