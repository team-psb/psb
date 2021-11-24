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
        $schdules = Schdule::get();
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
        $data = $request->all();
        
        $request->validate([
            'image' => 'required',
            'title' => 'required',
            'content' => 'required',
        ]);
        $data['image'] = $request->file('image')->store('assets/information','public');
        
        Schdule::create($data);

        return redirect()->route('schdules.index');
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
        $data = $request->all();

        $request->validate([
            'image' => 'required',
            'title' => 'required',
            'content' => 'required',
        ]);
        $data['image'] = $request->file('image')->store('assets/information','public');
        Schdule::findOrFail($id)->update($data);

        return redirect()->route('schdules.index');
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

        return back();
    }
}
