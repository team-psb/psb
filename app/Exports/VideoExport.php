<?php

namespace App\Exports;

use App\Models\AcademyYear;
use App\Models\Video;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use phpDocumentor\Reflection\PseudoTypes\True_;

class VideoExport implements FromView,ShouldAutoSize,WithHeadings,WithColumnFormatting
{
   /**
    * @return \Illuminate\Support\Collection
    */
    public function view() :View
    {
        $tahun_ajaran = AcademyYear::where('is_active', true)->orderBy('id','desc')->first()->id;

        $video = Video::with(['academy_year'=>function($query){
            $query->where('is_active','=', true);
        },'user.biodataOne','user.video'])->where('academy_year_id', $tahun_ajaran)->get();

        return view('admin.pages.video.excel',compact('video', 'tahun_ajaran'));
    }

    public function headings():array
    {
        return[
            'Nama',
            'Link',
            'No WA',
        ];
    }

    public function columnFormats(): array
    {
        return [
            'D' => '@',
        ];
    }

}