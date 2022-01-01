<?php

namespace App\Exports;

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
        $nilai = ScorePersonal::with(['academy_year'=>function($query){
            $query->where('is_active','=', true);
        },'user.biodataOne', 'user.score'])->get();

        return view('admin.pages.scorePersonal.excel',compact('nilai'));
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