<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Interview;
use App\Models\Pass;
use App\Models\Stage;
use Illuminate\Http\Request;

class PassController extends Controller
{
    public function index()
    {
        $stages = Stage::get();
        
        if (request()->get('stage_id') && request()->get('stage_id') != null){
            $data = Interview::with(['academy_year'=>function($query){
                $query->where('stage_id','=', request()->get('stage_id'));
            },'user.biodataOne'])->where('status', 'lolos')->orderBy('id','desc');
        }else {
            $data = Interview::with(['academy_year'=>function($query){
                $query->where('is_active','=', true);
            },'user.biodataOne'])->where('status', 'lolos')->orderBy('id','desc');
        }

        $data = $data->get();
        $passes = $data->where('academy_year', '!=', null);
        return view('admin.pages.pass.index',compact('passes', 'stages'));
    }

    public function delete($id)
    {
        $data = Pass::findOrFail($id);
        $data->delete();

        return back();
    }

    public function deleteAll(Request $request)
    {
        $ids=$request->get('ids');
        
        if ($ids != null) {
            foreach ($ids as $id) {
                Pass::find($id)->delete();
            }

            return redirect()->route('passes.index');
        }else{
            return redirect()->back();
        }
    }

    public function filterreset()
    {
        return redirect()->route('passes.index');
    }
}
