<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Score;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    public function index()
    {
        $scores = Score::get();

        return view('admin.pages.score.index', [
            'scores' => $scores
        ]);
    }

    public function delete($id)
    {
        $data = Score::findOrFail($id);
        $data->delete();

        return back();
    }

    public function passAll(Request $request)
    {
        $ids=$request->get('ids');
        if ($ids != null) {
            foreach ($ids as $id) {
                Score::find($id)->update(['status'=>'lolos']);
            }

            return redirect()->route('scores.index');
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

            return redirect()->route('scores.index');
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

            return redirect()->route('scores.index');
        }else{
            return redirect()->back();
        }
    }
}
