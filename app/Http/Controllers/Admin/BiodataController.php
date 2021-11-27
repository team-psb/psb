<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BiodataTwo;

class BiodataController extends Controller
{
    public function index()
    {
        // $data = BiodataTwo::with(['academy_year'=>function($query){
        //     $query->where('is_active','=','1');
        // },'user.biodataOne'])->orderBy('created_at','desc')->get();

        $data = BiodataTwo::with(['academy_year'=>function($query){
            $query->where('is_active','=','1');
        }])->orderBy('created_at','desc')->get();

        $biodata = $data->where('academy_year', '!=', null);
        dd($data);
        return view('admin.pages.biodata.index', [
            'biodata' => $biodata
        ]);
    }
}
