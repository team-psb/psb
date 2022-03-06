<?php

namespace App\Http\Controllers\Admin;

use App\Exports\BiodataExport;
use App\Http\Controllers\Controller;
use App\Models\BiodataOne;
use App\Models\BiodataTwo;
use App\Models\Interview;
use App\Models\ScoreIq;
use App\Models\ScorePersonal;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class RegisterController extends Controller
{
    public function index()
    {
        $registers = BiodataOne::orderBy('id', 'desc')->get();  
        
        return view('admin.pages.register.index', compact('registers'));
    }

    public function edit($id)
    {
        $biodata = BiodataOne::findOrFail($id);

        return view('admin.pages.register.edit', [
            'biodata' => $biodata
        ]);
    }

    public function update(Request $request,$id)
    {
        $biodata1 = BiodataOne::find($id);

        $biodata1->update([
            'full_name'=>$request->full_name,
            'age'=>$request->age,
            'no_wa'=>$request->no_wa,
            'family'=>$request->family
        ]);

        activity()->log('Mengedit biodata '.$request->name);

        return redirect()->route('registers.index')->with('success-edit','Data Berhasil Diedit');
    }

    public function updateTwo(Request $request,$id)
    {
        $biodata1 = BiodataOne::find($request->biodataOne_id);
        $biodata2 = BiodataTwo::find($id);

        $biodata1->update([
            'full_name'=>$request->full_name,
            'age'=>$request->age,
            'no_wa'=>$request->no_wa,
            'family'=>$request->family
        ]);

        $biodata2->update($request->except(['full_name','age','no_wa','family']));
        activity()->log('Mengedit biodata '.$request->name);

        return redirect()->route('registers.index')->with('success-edit','Data Berhasil Diedit');
    }
    
    
    public function delete($id)
    {
        $data = BiodataOne::findOrFail($id);
        $data->delete();

        ScoreIq::where('user_id', $data->user_id)->delete();
        ScorePersonal::where('user_id', $data->user_id)->delete();
        Video::where('user_id', $data->user_id)->delete();
        Interview::where('user_id', $data->user_id)->delete();
        BiodataTwo::where('user_id', $data->user_id)->delete();
        User::where('id', $data->user_id)->delete();
        
        activity()->log('Menghapus biodata id '.$data->name);

        return back()->with('success-delete','Berhasil Menghapus Data');
    }

    public function deleteAll(Request $request)
    {
        $ids=$request->get('ids');
        
        if ($ids != null) {
            foreach ($ids as $id) {
                $data = BiodataOne::find($id);
                $data->delete();
                ScoreIq::where('user_id', $data->user_id)->delete();
                ScorePersonal::where('user_id', $data->user_id)->delete();
                Video::where('user_id', $data->user_id)->delete();
                Interview::where('user_id', $data->user_id)->delete();
                BiodataTwo::where('user_id', $data->user_id)->delete();
                User::where('id', $data->user_id)->delete();
            }
            activity()->log('Menghapus semua biodata');

            return redirect()->route('biodatas.index')->with('success-delete','Berhasil Menghapus Semua Data');
        }else{
            return redirect()->back();
        }
    }

    // public function export() 
    // {
    //     return Excel::download(new BiodataExport, 'data biodata.xlsx');
    // }
}
