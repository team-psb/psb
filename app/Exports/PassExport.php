<?php

namespace App\Exports;

use App\Models\AcademyYear;
use App\Models\Interview;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PassExport implements FromView,ShouldAutoSize,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view() :View
    {
        $tahun_ajaran = AcademyYear::where('is_active', true)->orderBy('id','desc')->first()->id;

        $lolos = Interview::with(['academy_year'=>function($query){
            $query->where('is_active','=',true);
        },'user.biodataOne'])->where('status','=','lolos')->where('academy_year_id', $tahun_ajaran)->get();
        // },'user.biodataOne','user.biodataTwo.kabupaten','user.biodataTwo.provinsi'])->where('status','=','lolos')->get();

        return view('admin.pages.pass.exel',compact('lolos', 'tahun_ajaran'));
    }

    public function headings():array
    {
        return[
            'Nama',
            'Kabupaten / Kota',
            'Provinsi',
            'No Wa',
            'Umur',
            'Pendidikan',
            'Cita-cita',
            'Prestasi',
            'Skill',
            'Hafalan',
            'Gamer',
            'Keluarga',
            'Orang Tua',
            'Penghasilan Ortu',
            'Nama Wali',
            'No Wali',
        ];
    }
}