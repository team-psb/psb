<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcademyYear;
use App\Models\Stage;
use Illuminate\Http\Request;

class AcademyYearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $academies = AcademyYear::get();
        return view('admin.pages.academyYear.index', [
            'academies' => $academies
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stages = Stage::get();
        return view('admin.pages.academyYear.create', [
            'stages' => $stages
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate([
            'year' => 'required',
            'stage_id' => 'required',
        ]);

        AcademyYear::create($data);
        activity()->log('Membuat data tahun ajaran');

        return redirect()->route('academies.index')->with('success-create', 'Berhasil Membuat Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $academy = AcademyYear::findOrFail($id);

        return view('admin.pages.academyYear.show', [
            'academy' => $academy
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $academy = AcademyYear::findOrFail($id);
        $stages = Stage::get();

        return view('admin.pages.academyYear.edit', [
            'academy' => $academy,
            'stages' => $stages
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $request->validate([
            'year' => 'required',
            'stage_id' => 'required',
        ]);

        AcademyYear::findOrFail($id)->update($data);
        activity()->log('Mengedit tahun ajaran id '.$id);

        return redirect()->route('academies.index')->with('success-edit', 'Berhasil Mengedit Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = AcademyYear::findOrFail($id);
        $data->delete();
        activity()->log('Menghapus tahun ajaran id '.$id);

        return back()->with('delete', 'Berhasil Menghapus Data');
    }

    public function setStatus(Request $request, $id)
    {
        $request->validate([
            'is_active' => 'required|in:1,0'
        ]);

        $item = AcademyYear::findOrFail($id);
        $item->is_active = $request->is_active;

        $item->save();

        return redirect()->route('academies.index')->with('success-edit', 'Berhasil Mengganti Status Data');
    }

    public function activeAll(Request $request)
    {
        $ids = $request->get('ids');
        if ($ids != null) {
            foreach ($ids as $id ) {
                AcademyYear::find($id)->update(['is_active'=>'1']);
            }
            return redirect()->route('academies.index')->with('success-edit', 'Berhasil Mengaktifkan Semua Data');
        }else{
            return redirect()->back();
        }
    }

    public function nonActiveAll(Request $request)
    {
        $ids = $request->get('ids');
        if ($ids != null) {
            foreach ($ids as $id ) {
                AcademyYear::find($id)->update(['is_active'=>'0']);
            }
            return redirect()->route('academies.index')->with('success-delete', 'Berhasil Menonaktifkan Semua Data');
        }else{
            return redirect()->back();
        }
    }

    public function deleteAll(Request $request)
    {
        $ids=$request->get('ids');

        if ($ids == null) {
            return redirect()->back();
        }else{
            foreach ($ids as $id) {
                AcademyYear::find($id)->delete();
            }
            activity()->log('Menghapus semua tahun ajaran');

            return redirect()->route('academies.index')->with('success-delete', 'Berhasil Menghapus Semua Data');
        }
    }
}
