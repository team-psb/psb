<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BiodataOne;
use App\Models\BiodataTwo;
use App\Models\Interview;
use App\Models\Qna;
use App\Models\QuestionIq;
use App\Models\QuestionPersonal;
use App\Models\Schdule;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $pendaftar = BiodataTwo::whereHas('academy_year', function($q) {
            $q->where('is_active', true);
        })->count();

        $lolos = Interview::with(['academy_year'=>function($query){
            $query->where('is_active','=', true);
        },'user.biodataOne'])->where('status', 'lolos')->count();
    
        $iq = QuestionIq::get()->count();
        $kepribadian = QuestionPersonal::get()->count();
        $informasitotal = Schdule::get()->count();
        $informasi = Schdule::orderBy('id', 'desc')->limit(5)->get();
        $qna = Qna::get()->count();
        $newusers = BiodataOne::orderBy('id', 'desc')->take(5)->get();

        $age = [
            '16' => BiodataOne::where('age', '16')->count(),
            '17' => BiodataOne::where('age', '17')->count(),
            '18' => BiodataOne::where('age', '18')->count(),
            '19' => BiodataOne::where('age', '19')->count(),
            '20' => BiodataOne::where('age', '20')->count(),
            '21' => BiodataOne::where('age', '21')->count(),
        ];
        
        return view('admin.index', [
            'pendaftar' => $pendaftar,
            'lolos' => $lolos,
            'iq' => $iq,
            'kepribadian' => $kepribadian,
            'informasitotal' => $informasitotal,
            'informasi' => $informasi,
            'qna' => $qna,
            'age' => $age,
            'newusers' => $newusers,
        ]);
    }
}
