<?php

namespace App\Exports;

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
        $video = Video::with(['academy_year'=>function($query){
            $query->where('is_active','=', true);
        },'user.biodataOne','user.video'])->get();

        return view('admin.pages.video.excel',compact('video'));
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
