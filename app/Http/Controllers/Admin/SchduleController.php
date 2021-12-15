<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schdule;
use Illuminate\Http\Request;

class SchduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schdules = Schdule::orderBy('id', 'desc')->get();
        return view('admin.pages.schdule.index', [
            'schdules' => $schdules
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.schdule.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        if ($request->file('image') !== null ) {
            $image = $request->file('image')->store('assets/information','public');
        }else{
            $image=null;
        }
        
        Schdule::create([
            'image' => $image,
            'title' => $request->title,
            'video' => $request->video,
            'content' => $request->content
        ]);
        activity()->log('Membuat  data informasi');

        return redirect()->route('schdules.index')->with('success-create', 'Berhasil Membuat Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $schdule = Schdule::findOrFail($id);

        return view('admin.pages.schdule.show', [
            'schdule' => $schdule
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
        $schdule = Schdule::findOrFail($id);

        return view('admin.pages.schdule.edit', [
            'schdule' => $schdule
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
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $data=Schdule::find($id);
        
        if ($request->file('image') != null ) {
            $image = $request->file('image')->store('assets/information','public');
        }else{
            $image = $data->image;
        }
        
        $data->update([
            'image' => $image,
            'title' => $request->title,
            'content' => $request->content
        ]);
        activity()->log('Mengedit informasi id '.$id);

        return redirect()->route('schdules.index')->with('success-edit', 'Berhasil Mengedit Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Schdule::findOrFail($id);
        $data->delete();
        activity()->log('Menghapus informasi id '.$id);

        return back()->with('success-delete', 'Berhasil Menghapus Data');
    }

    public function deleteAll(Request $request)
    {
        $ids=$request->get('ids');

        if ($ids == null) {
            return redirect()->back();
        }else{
            foreach ($ids as $id) {
                Schdule::find($id)->delete();
            }
            activity()->log('Menghapus semua informasi');

            return redirect()->route('schdules.index')->with('success-delete', 'Berhasil Menghapus Semua Data');
        }
    }
}
