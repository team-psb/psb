<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Qna;
use Illuminate\Http\Request;

class QnaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $qnas = Qna::get();
        return view('admin.pages.qna.index', [
            'qnas' => $qnas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.qna.create');
    }

    public function createPage()
    {
        return view('admin.pages.qna.createPage');
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
            'question' => 'required',
            'answer' => 'required',
        ]);

        Qna::create($data);
        activity()->log('Membuat  data QnA');

        return redirect()->route('qna.index')->with('success-create', 'Berhasil Membuat Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $qna = Qna::findOrFail($id);

        return view('admin.pages.qna.show', [
            'qna' => $qna
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
        $qna = Qna::findOrFail($id);

        return view('admin.pages.qna.edit', [
            'qna' => $qna
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
            'question' => 'required',
            'answer' => 'required',
        ]);

        Qna::findOrFail($id)->update($data);
        activity()->log('Mengedit  data QnA id '.$id);

        return redirect()->route('qna.index')->with('success-edit', 'Berhasil Mengedit Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Qna::findOrFail($id);
        $data->delete();
        activity()->log('Menghapus  data QnA id '.$id);

        return back()->with('success-delete', 'Berhasil Menghapus Data');
    }

    public function deleteAll(Request $request)
    {
        $ids=$request->get('ids');

        if ($ids == null) {
            return redirect()->back();
        }else{
            foreach ($ids as $id) {
                Qna::find($id)->delete();
            }
            activity()->log('Menghapus semua data QnA ');

            return redirect()->route('qna.index')->with('success-delete', 'Berhasil Menghapus Semua Data');
        }
    }
}
