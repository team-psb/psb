<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BiodataOne;
use Illuminate\Http\Request;
use App\Models\BiodataTwo;

class BiodataController extends Controller
{
    public function index()
    {
        // $biodatas = BiodataTwo::with(['academy_year'=>function($query){
        //     $query->where('is_active','=','1');
        // },'user.biodataOne'])->orderBy('created_at','desc')->get();

            $biodatas = BiodataTwo::get();

        // dd($biodatas);
        // $biodata = $data->where('academy_year', '!=', null);
        return view('admin.pages.biodata.index', [
            'biodatas' => $biodatas
        ]);
    }
}
