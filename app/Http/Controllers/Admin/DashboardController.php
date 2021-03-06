<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcademyYear;
use App\Models\ActivityLog;
use App\Models\BiodataOne;
use App\Models\BiodataTwo;
use App\Models\Interview;
use App\Models\Qna;
use App\Models\QuestionIq;
use App\Models\QuestionPersonal;
use App\Models\Schdule;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Stage;
class DashboardController extends Controller
{
    public function index()
    {
        // $pendaftar = BiodataTwo::whereHas('academy_year', function($q) {
        //     $q->where('is_active', true);
        // })->whereDate('created_at', Carbon::today())->count();
        // $totalpendaftar = BiodataTwo::whereHas('academy_year', function($q) {
        //     $q->where('is_active', true);
        // })->count();
        // $pendaftar = BiodataTwo::whereRelation('academy_year', 'is_active', true)->whereDate('created_at', Carbon::today())->count();
        $pendaftar = BiodataOne::whereRelation('academy_year', 'is_active', true)->count();
        $totalpendaftar = BiodataOne::whereHas('biodataTwo')->whereRelation('academy_year', 'is_active', true)->count();
        $sangatmampu = BiodataOne::where('family', 'sangat-mampu')->whereHas('biodataTwo')->whereRelation('academy_year', 'is_active', true)->count();
        $mampu = BiodataOne::where('family', 'mampu')->whereHas('biodataTwo')->whereRelation('academy_year', 'is_active', true)->count();
        $tidakmampu = BiodataOne::where('family', 'tidak-mampu')->whereHas('biodataTwo')->whereRelation('academy_year', 'is_active', true)->count();
        $biodataPending = BiodataTwo::where('status', null)->count();

        $lolos = Interview::with(['academy_year'=>function($query){
            $query->where('is_active','=', true);
        },'user.biodataOne'])->where('status', 'lolos')->get();

        $iq = QuestionIq::get()->count();
        $kepribadian = QuestionPersonal::get()->count();
        $informasitotal = Schdule::get()->count();
        $informasi = Schdule::orderBy('id', 'desc')->limit(5)->get();
        $qna = Qna::get()->count();
        $newusers = BiodataOne::orderBy('id', 'desc')->take(5)->get();  
        $activities = ActivityLog::with('user')->orderBy('id', 'desc')->limit(10)->get();
        $activitiescount = ActivityLog::with('user')->whereDate('created_at', Carbon::today())->count();
        $label  = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];

        for($bulan=1;$bulan < 13;$bulan++){
            $inYear = BiodataOne::whereHas('biodataTwo')
            ->whereMonth('created_at', $bulan)
            ->whereYear('created_at', Carbon::now())
            ->count();
            $tahunIni[] = $inYear;

            $lastYear = BiodataOne::whereHas('biodataTwo')
            ->whereMonth('created_at', $bulan)
            ->whereYear('created_at', (Carbon::now()->year)-1)
            ->count();
            $tahunLalu[] = $lastYear;
            // $chartThisYear     = collect(DB::SELECT("SELECT count(id) AS jumlah from biodata_ones where month(created_at)='$bulan'"))->first();
            // $lastYear     = collect(DB::SELECT("SELECT count(id) AS jumlah from biodata_ones where month(created_at)='$bulan'"))->first();
            
            // $tahunIni[] = $chartThisYear->jumlah;
            // $tahunLalu[] = $lastYear->jumlah;

        }

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
            'totalpendaftar' => $totalpendaftar,
            'lolos' => $lolos,
            'iq' => $iq,
            'kepribadian' => $kepribadian,
            'informasitotal' => $informasitotal,
            'informasi' => $informasi,
            'qna' => $qna,
            'age' => $age,
            'newusers' => $newusers,
            'activities' => $activities,
            'activitiescount' => $activitiescount,
            'label' => $label,
            'tahunIni' => $tahunIni,
            'tahunLalu' => $tahunLalu,
            'sangatmampu' => $sangatmampu,
            'mampu' => $mampu,
            'tidakmampu' => $tidakmampu,
            'biodataPending' => $biodataPending,
        ]);
    }
}
