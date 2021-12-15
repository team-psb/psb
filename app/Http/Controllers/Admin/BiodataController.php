<?php

namespace App\Http\Controllers\Admin;

use App\Exports\BiodataExport;
use App\Http\Controllers\Controller;
use App\Models\BiodataOne;
use Illuminate\Http\Request;
use App\Models\BiodataTwo;
use App\Models\Score;
use App\Models\Stage;
use Laravolt\Indonesia\Models\Province;
use Maatwebsite\Excel\Facades\Excel;

class BiodataController extends Controller
{
    // public function index()
    // {
    //     $stages = Stage::get();
    //     // $biodatas = BiodataTwo::with(['academy_year'=>function($query){
    //     //     $query->where('is_active','=','1');
    //     // },'user.biodataOne'])->orderBy('created_at','desc')->get();

    //         $biodatas = BiodataTwo::get();

    //     // dd($biodatas);
    //     // $biodata = $data->where('academy_year', '!=', null);
    //     return view('admin.pages.biodata.index', [
    //         'biodatas' => $biodatas,
    //         'stages' => $stages
    //     ]);
    // }

    public function index()
    {
        $stages = Stage::get();
        if (request()->get('stage_id') && request()->get('stage_id') != null){
            $data = BiodataTwo::with(['academy_year'=>function($query){
                $query->where('stage_id','=', request()->get('stage_id'));
            },'user.biodataOne'])->orderBy('created_at','desc');
        }else {
            $data = BiodataTwo::with(['academy_year'=>function($query){
                $query->where('is_active','=', true);
            },'user.biodataOne'])->orderBy('created_at','desc');
        }
        
        if(request()->get('age') && request()->get('age') != null){
            $data=$data->whereHas('user',function($query){
                $query->whereHas('biodataOne',function($query2){
                    $query2->where('age','=', request()->get('age'));
                });
            });
        }

        if(request()->get('parent') && request()->get('parent') != null){
            $data=$data->where('parent','=',request()->get('parent'));
        }

        if(request()->get('last_education') && request()->get('last_education') != null){
            $data=$data->where('last_education','=',request()->get('last_education'));
        }

        if(request()->get('smoker') && request()->get('smoker') != null){
            $data=$data->where('smoker','=',request()->get('smoker'));
        }

        if(request()->get('girlfriend') && request()->get('girlfriend') != null){
            $data=$data->where('girlfriend','=',request()->get('girlfriend'));
        }

        if(request()->get('gamer') && request()->get('gamer') != null){
            $data=$data->where('gamer','=',request()->get('gamer'));
        }

        if((request()->get('parent_income_min') && request()->get('parent_income_min') != null) && (request()->get('parent_income_max') && request()->get('parent_income_max') != null)){
            $data=$data->whereBetween('parent_income',[request()->get('parent_income_min'),request()->get('parent_income_max')]);
        }

        if(request()->get('family') && request()->get('family') != null){
            $data=$data->whereHas('user',function($query){
                $query->whereHas('biodataOne',function($query2){
                    $query2->where('family','=', request()->get('family'));
                });
            });
        }
        $data = $data->get();

        $data2 = Score::with(['academy_year'=>function($query){
            $query->where('is_active','=', true);
        },'user.biodataOne'])->get();

        $biodatas = $data->where('academy_year','!=', null);
        return view('admin.pages.biodata.index',compact('biodatas', 'stages'));
    }

    public function show($id)
    {
        $biodata = BiodataTwo::findOrFail($id);

        return view('admin.pages.biodata.detail', [
            'biodata' => $biodata
        ]);
    }

    public function edit($id)
    {
        $biodata = BiodataTwo::findOrFail($id);

        return view('admin.pages.biodata.edit', [
            'biodata' => $biodata
        ]);
    }

    public function update(Request $request,$id)
    {
        $biodata1 = BiodataOne::find($request->biodataOne_id);
        $biodata2 = BiodataTwo::find($id);

        $biodata1->update([
            'name'=>$request->name,
            'age'=>$request->age,
            'no_wa'=>$request->no_wa,
            'family'=>$request->family
        ]);

        $biodata2->update($request->except(['full_name','age','no_wa','family']));
        activity()->log('Mengedit biodata '.$request->name);

        return redirect()->route('biodatas.index')->with('success-edit','Data Berhasil Diedit');
    }

    public function delete($id)
    {
        $data = BiodataTwo::findOrFail($id);
        $data->delete();
        activity()->log('Menghapus biodata id '.$data->name);

        return back()->with('success-delete','Berhasil Menghapus Data');
    }

    public function setStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:lolos,tidak'
        ]);

        $item = BiodataTwo::findOrFail($id);
        $item->status = $request->status;
        $item->save();

        return redirect()->route('biodatas.index')->with('success-edit', 'Berhasil Mengganti Status Data');
    }

    public function passAll(Request $request)
    {
        $ids=$request->get('ids');
        if ($ids != null) {
            foreach ($ids as $id) {
                BiodataTwo::find($id)->update(['status'=>'lolos']);
            }

            return redirect()->route('biodatas.index')->with('success-edit','Berhasil Mengganti Semua Status Data');
        }else{
            return redirect()->back();
        }
    }

    public function nonpassAll(Request $request)
    {
        $ids=$request->get('ids');
        if ($ids != null) {
            foreach ($ids as $id) {
                BiodataTwo::find($id)->update(['status'=>'tidak']);
            }

            return redirect()->route('biodatas.index')->with('success-edit','Berhasil Mengganti Semua Status Data');
        }else{
            return redirect()->back();
        }
    }

    public function deleteAll(Request $request)
    {
        $ids=$request->get('ids');
        
        if ($ids != null) {
            foreach ($ids as $id) {
                BiodataTwo::find($id)->delete();
            }
            activity()->log('Menghapus semua biodata');

            return redirect()->route('biodatas.index')->with('success-delete','Berhasil Menghapus Semua Data');
        }else{
            return redirect()->back();
        }
    }

    public function filterreset()
    {
        return redirect()->route('biodatas.index');
    }

    public function export() 
    {
        return Excel::download(new BiodataExport, 'data biodata.xlsx');
    }
}
