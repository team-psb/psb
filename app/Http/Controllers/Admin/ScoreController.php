<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ScoreExport;
use App\Http\Controllers\Controller;
use App\Models\AcademyYear;
use App\Models\Score;
use App\Models\Stage;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ScoreController extends Controller
{
    public function index()
    {
        $tahun_ajaran = AcademyYear::where('is_active', true)->orderBy('id','desc')->first()->id;
        $stages = Stage::get();

        if (request()->get('stage_id') && request()->get('stage_id') != null){
            $data = Score::with(['academy_year'=>function($query){
                $query->where('stage_id','=', request()->get('stage_id'));
            },'user.biodataOne'])->where('academy_year_id', $tahun_ajaran)->orderBy('id','desc');
        }else {
            $data = Score::with(['academy_year'=>function($query){
                $query->where('is_active','=', true);
            },'user.biodataOne'])->where('academy_year_id', $tahun_ajaran)->orderBy('id','desc');
        }


        if((request()->get('score_test_iq_min') && request()->get('score_test_iq_min') != null) && (request()->get('score_test_iq_max') && request()->get('score_test_iq_max') != null)){
            $data = $data->whereBetween('score_question_iq',[request()->get('score_test_iq_min'),request()->get('score_test_iq_max')]);
        }

        if((request()->get('score_test_personal_min') && request()->get('score_test_personal_min') != null) && (request()->get('score_test_personal_max') && request()->get('score_test_personal_max') != null)){
            $data = $data->whereBetween('score_question_personal',[request()->get('score_test_personal_min'),request()->get('score_test_personal_max')]);
        }

        $data = $data->get();
        $scores = $data->where('academy_year', '!=', null);
        return view('admin.pages.score.index',compact('scores', 'stages'));
    }

    public function delete($id)
    {
        $data = Score::findOrFail($id);
        $data->delete();
        activity()->log('Menghapus tes nilai id '.$id);

        return back();
    }

    public function setStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:lolos,tidak'
        ]);

        $item = Score::findOrFail($id);
        $item->status = $request->status;
        $item->save();

        return redirect()->route('scores.index')->with('success-edit', 'Berhasil Mengganti Status Data');
    }

    public function passAll(Request $request)
    {
        $ids=$request->get('ids');
        if ($ids != null) {
            foreach ($ids as $id) {
                Score::find($id)->update(['status'=>'lolos']);
            }

            return redirect()->route('scores.index')->with('success-edit','Berhasil Mengganti Semua Status Data');
        }else{
            return redirect()->back();
        }
    }

    public function nonpassAll(Request $request)
    {
        $ids=$request->get('ids');
        if ($ids != null) {
            foreach ($ids as $id) {
                Score::find($id)->update(['status'=>'tidak']);
            }

            return redirect()->route('scores.index')->with('success-edit','Berhasil Mengganti Semua Status Data');
        }else{
            return redirect()->back();
        }
    }

    public function deleteAll(Request $request)
    {
        $ids=$request->get('ids');

        if ($ids != null) {
            foreach ($ids as $id) {
                Score::find($id)->delete();
            }
        activity()->log('Menghapus semua data tes nilai');

            return redirect()->route('scores.index')->with('success-delete','Berhasil Menghapus Semua Status Data');
        }else{
            return redirect()->back();
        }
    }

    public function filter()
    {
        return view('admin.pages.score.filter');
    }

    public function filterreset()
    {
        return redirect()->route('scores.index');
    }

    public function export()
    {
        return Excel::download(new ScoreExport, 'data nilai.xlsx');
    }
}