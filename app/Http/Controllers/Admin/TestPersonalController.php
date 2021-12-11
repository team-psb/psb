<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\QuestionPersonalImport;
use App\Models\QuestionPersonal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Facades\Excel;

class TestPersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = QuestionPersonal::orderBy('id', 'desc')->get();
        return view('admin.pages.questionPersonal.index', [
            'questions' => $questions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.questionPersonal.modal-create');
    }

    public function questionCreate()
    {
        return view('admin.pages.questionPersonal.createPage');
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
            'poin_a' => 'required',
            'poin_b' => 'required',
            'poin_c' => 'required',
            'poin_d' => 'required',
            'poin_e' => 'required'
        ]);

        QuestionPersonal::create([
            'question' => $request->question,
            'a' => $request->a,
            'b' => $request->b,
            'c' => $request->c,
            'd' => $request->d,
            'e' => $request->e,
            'poin_a' => $request->poin_a,
            'poin_b' => $request->poin_b,
            'poin_c' => $request->poin_c,
            'poin_d' => $request->poin_d,
            'poin_e' => $request->poin_e
        ]);
        activity()->log('Membuat soal kepribadian');

        return redirect()->route('personals.index')->with('success-create', 'Berhasil Membuat Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = QuestionPersonal::findOrFail($id);

        return view('admin.pages.questionPersonal.show', [
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
        $question = QuestionPersonal::findOrFail($id);

        return view('admin.pages.questionPersonal.edit', [
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
            'poin_a' => 'required',
            'poin_b' => 'required',
            'poin_c' => 'required',
            'poin_d' => 'required',
            'poin_e' => 'required'
        ]);

        $data = QuestionPersonal::findOrFail($id);
        
        $data->update([
            'question' => $request->question,
            'a' => $request->a,
            'b' => $request->b,
            'c' => $request->c,
            'd' => $request->d,
            'e' => $request->e,
            'poin_a' => $request->poin_a,
            'poin_b' => $request->poin_b,
            'poin_c' => $request->poin_c,
            'poin_d' => $request->poin_d,
            'poin_e' => $request->poin_e
        ]);
        activity()->log('Mengedit soal kepribadian id '.$id);

        return redirect()->route('personals.index')->with('success-edit', 'Berhasil Mengedit Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = QuestionPersonal::find($id);

        $data->delete();
        activity()->log('Menghapus soal kepribadian id '.$id);

        return back()->with('success-delete', 'Berhasil Menghapus Data');
    }

    public function deleteAll(Request $request)
    {
        $ids=$request->get('ids');

        if ($ids == null) {
            return redirect()->back();
        }else{
            foreach ($ids as $id) {
                QuestionPersonal::find($id)->delete();
            }
            activity()->log('Menghapus semua tes kepribadian');

            return redirect()->route('personals.index')->with('success-delete', 'Berhasil Menghapus Semua Data');
        }
    }

    public function import(Request $request) 
    {
        Excel::import(new QuestionPersonalImport,$request->file('file'));
        activity()->log('Mengimpor soal tes kepribadian');

        return redirect()->route('personals.index')->with('success-create', 'Berhasil mengimport file excel');
    }

    public function downloadtemplate()
    {
        $template ="./template-import/template-import-soal-tes-kepribadian.csv";
        activity()->log('Mendownload template soal tes kepribadian');

        return Response::download($template);
    }
}
