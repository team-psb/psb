<?php

namespace App\Http\Controllers\Admin;

use App\Exports\PassExport;
use App\Http\Controllers\Controller;
use App\Models\Interview;
use App\Models\Pass;
use App\Models\Stage;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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
        activity()->log('Menghapus data calon santri id '.$id);

        return back()->with('success-delete','Berhasil Menghapus Data');
    }

    public function deleteAll(Request $request)
    {
        $ids=$request->get('ids');
        
        if ($ids != null) {
            foreach ($ids as $id) {
                Pass::find($id)->delete();
            }
        activity()->log('Menghapus semua data calon santri');

            return redirect()->route('passes.index')->with('success-delete','Berhasil Menghapus Semua Data');
        }else{
            return redirect()->back();
        }
    }

    public function filterreset()
    {
        return redirect()->route('passes.index');
    }

    public function export() 
    {
        return Excel::download(new PassExport, 'data calon santri baru tahun '.date('Y').'.xlsx');
    }
}
