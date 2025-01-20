<?php

namespace App\Exports;

use App\Models\AcademyYear;
use App\Models\Score;
use App\Models\ScorePersonal;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class ScorePersonalExport implements FromView,ShouldAutoSize,WithHeadings,WithColumnFormatting
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view() :View
    {
        $tahun_ajaran = AcademyYear::where('is_active', true)->orderBy('id','desc')->first()->id;

        $nilai = ScorePersonal::with(['academy_year'=>function($query){
            $query->where('is_active','=', true);
        },'user.biodataOne', 'user.score'])->where('academy_year_id', $tahun_ajaran)->get();

        return view('admin.pages.scorePersonal.excel',compact('nilai', 'tahun_ajaran'));
    }

    public function headings():array
    {
        return[
            'Nama',
            // 'nilai tes iq',
            'nilai tes kepribadian',
            'no wa',
        ];
    }

    public function columnFormats(): array
    {
        return [
            'D' => '@',
        ];
    }

}