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
            'full_name'=>$request->full_name,
            'age'=>$request->age,
            'no_wa'=>$request->no_wa,
            'family'=>$request->family
        ]);

        $biodata2->update($request->except(['full_name','age','no_wa','family']));
        return redirect()->route('biodata.index')->with('edit-sukses','Data Berhasil Diedit');
    }

    public function delete($id)
    {
        $data = BiodataTwo::findOrFail($id);
        $data->delete();

        return back();
    }

    public function passAll(Request $request)
    {
        $ids=$request->get('ids');
        if ($ids != null) {
            foreach ($ids as $id) {
                BiodataTwo::find($id)->update(['status'=>'lolos']);
            }

            return redirect()->route('biodata.index');
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

            return redirect()->route('biodata.index');
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

            return redirect()->route('biodata.index');
        }else{
            return redirect()->back();
        }
    }
}
