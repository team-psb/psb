<?php

namespace App\Exports;

use App\Models\AcademyYear;
use App\Models\BiodataOne;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BiodataOneExport implements FromView,ShouldAutoSize,WithHeadings,WithColumnFormatting
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function view(): View
    {
        $tahun_ajaran = AcademyYear::where('is_active', true)->orderBy('id','desc')->first()->id;

        $biodatas = BiodataOne::with(['academy_year'=>function($query){
            $query->where('stage_id','=', request()->get('stage_id'));
        },'user.biodataOne'])->where('academy_year_id', $tahun_ajaran)->orderBy('id', 'desc')->get();

        return view('admin.pages.register.exel',compact('biodatas', 'tahun_ajaran'));
    }

    public function headings():array
    {
        return[
            'No',
            'Nama',
            'No Wa',
            'Umur',
            // 'Pendidikan',
            // 'Cita-cita',
            // 'Prestasi',
            // 'Skill',
            // 'Hafalan',
            // 'Gamer',
            // 'Keluarga',
            // 'Orang Tua',
            // 'Penghasilan Ortu',
            'Status'
        ];
    }

    public function columnFormats(): array
    {
        return [
            'C' => '@',
        ];
    }
}