<?php

namespace App\Exports;

use App\Models\AcademyYear;
use App\Models\BiodataTwo;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;


class BiodataExport implements FromView,ShouldAutoSize,WithHeadings,WithColumnFormatting
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function view(): View
    {
        $tahun_ajaran = AcademyYear::where('is_active', true)->orderBy('id','desc')->first()->id;

        if (request()->get('stage_id') && request()->get('stage_id') != null){
            $data = BiodataTwo::with(['academy_year'=>function($query){
                $query->where('stage_id','=', request()->get('stage_id'));
            },'user.biodataOne'])->where('academy_year', $tahun_ajaran)->orderBy('created_at','desc');
        } else {
            $data = BiodataTwo::with(['academy_year'=>function($query){
                $query->where('is_active','=', true);
            },'user.biodataOne'])->where('academy_year', $tahun_ajaran)->orderBy('created_at','desc');
        }
        $data=$data->get();

        $biodatas = $data->where('academy_year_id','!=',null);
        return view('admin.pages.biodata.exel',compact('biodatas', 'tahun_ajaran'));
    }

    public function headings():array
    {
        return[
            'No',
            'Nama',
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