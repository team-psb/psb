<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QuestionIq;
use Illuminate\Http\Request;

class TestIqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $iqs = QuestionIq::orderBy('id', 'asc')->get();
        return view('admin.pages.questionIq.index', [
            'iqs' => $iqs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.questionIq.create');
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
            'question' => 'required',
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'd' => 'required',
            'e' => 'required',
            'answer_key' => 'required'
        ]);

        if ($request->file('image') !== null ) {
            $image = $request->file('image')->store('assets/iq','public');
        }else{
            $image = null;
        }
        QuestionIq::create([
            'question' => $request->question,
            'image' => $image,
            'a' => $request->a,
            'b' => $request->b,
            'c' => $request->c,
            'd' => $request->d,
            'e' => $request->e,
            'answer_key' => $request->answer_key
        ]);

        return redirect()->route('iqs.index')->with('success-create', 'Berhasil Membuat Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = QuestionIq::findOrFail($id);

        return view('admin.pages.questionIq.show', [
            'question' => $question
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
        $question = QuestionIq::findOrFail($id);

        return view('admin.pages.questionIq.edit', [
            'question' => $question
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
            'question' => 'required',
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'd' => 'required',
            'e' => 'required',
            'answer_key' => 'required'
        ]);

        $data = QuestionIq::findOrFail($id);
        if ($request->file('image') !== null ) {
            $image = $request->file('image')->store('assets/iq','public');
        }else{
            $image = null;
        }
        $data->update([
            'question' => $request->question,
            'image' => $image,
            'a' => $request->a,
            'b' => $request->b,
            'c' => $request->c,
            'd' => $request->d,
            'e' => $request->e,
            'answer_key' => $request->answer_key
        ]);

        return redirect()->route('iqs.index')->with('success-edit', 'Berhasil Mengedit Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = QuestionIq::find($id);

        $data->delete();

        return back()->with('success-delete', 'Berhasil Menghapus Data');
    }

    public function deleteAll(Request $request)
    {
        $ids=$request->get('ids');

        if ($ids == null) {
            return redirect()->back();
        }else{
            foreach ($ids as $id) {
                QuestionIq::find($id)->delete();
            }

            return redirect()->route('iqs.index')->with('success-delete', 'Berhasil Menghapus Semua Data');
        }
    }
}
