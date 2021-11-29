<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pass;

class InterviewController extends Controller
{
    public function index()
    {
        $interviews = Pass::get();

        return view('admin.pages.interview.index', [
            'interviews' => $interviews
        ]);
    }

    public function delete($id)
    {
        $data = Pass::findOrFail($id);
        $data->delete();

        return back();
    }

    public function passAll(Request $request)
    {
        $ids=$request->get('ids');
        if ($ids != null) {
            foreach ($ids as $id) {
                Pass::find($id)->update(['status'=>'lolos']);
            }

            return redirect()->route('interviews.index');
        }else{
            return redirect()->back();
        }
    }

    public function nonpassAll(Request $request)
    {
        $ids=$request->get('ids');
        if ($ids != null) {
            foreach ($ids as $id) {
                Pass::find($id)->update(['status'=>'tidak']);
            }

            return redirect()->route('interviews.index');
        }else{
            return redirect()->back();
        }
    }

    public function deleteAll(Request $request)
    {
        $ids=$request->get('ids');
        
        if ($ids != null) {
            foreach ($ids as $id) {
                Pass::find($id)->delete();
            }

            return redirect()->route('interviews.index');
        }else{
            return redirect()->back();
        }
    }
}
