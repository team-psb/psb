<?php

namespace App\Exports;

use App\Models\AcademyYear;
use App\Models\Interview;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class InterviewExport implements FromView,ShouldAutoSize,WithHeadings,WithColumnFormatting
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view() :View
    {
        $tahun_ajaran = AcademyYear::where('is_active', true)->orderBy('id','desc')->first()->id;

        $interviews= Interview::with(['academy_year'=>function($query){
            $query->where('is_active','=', true);
        },'user.biodataOne'])->get();

        return view('admin.pages.interview.excel',compact('interviews', 'tahun_ajaran'));
    }

    public function headings():array
    {
        return[
            'Nama',
            'no wa',
        ];
    }

    public function columnFormats(): array
    {
        return [
            'B' => '@',
        ];
    }

}