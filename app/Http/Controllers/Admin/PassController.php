<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pass;
use Illuminate\Http\Request;

class PassController extends Controller
{
    public function index()
    {
        $passes = Pass::where('status', 'lolos')->get();

        return view('admin.pages.pass.index', [
            'passes' => $passes
        ]);
    }

    public function delete($id)
    {
        $data = Pass::findOrFail($id);
        $data->delete();

        return back();
    }

    public function deleteAll(Request $request)
    {
        $ids=$request->get('ids');
        
        if ($ids != null) {
            foreach ($ids as $id) {
                Pass::find($id)->delete();
            }

            return redirect()->route('passes.index');
        }else{
            return redirect()->back();
        }
    }
}
