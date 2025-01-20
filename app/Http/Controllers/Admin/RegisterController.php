<?php

namespace App\Http\Controllers\Admin;

use App\Exports\BiodataOneExport;
use App\Http\Controllers\Controller;
use App\Models\AcademyYear;
use App\Models\BiodataOne;
use App\Models\BiodataTwo;
use App\Models\Interview;
use App\Models\QuestionIqAnswer;
use App\Models\QuestionPersonalAnswer;
use App\Models\ScoreIq;
use App\Models\ScorePersonal;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class RegisterController extends Controller
{
    public function index()
    {
        $tahun_ajaran = AcademyYear::where('is_active', true)->orderBy('id','desc')->first()->id;
        $registers = BiodataOne::where('academy_year_id', $tahun_ajaran)->orderBy('id', 'desc')->get();

        return view('admin.pages.register.index', compact('registers', 'tahun_ajaran'));
    }

    public function edit($id)
    {
        $tahun_ajaran = AcademyYear::where('is_active', true)->orderBy('id','desc')->first()->id;
        $biodata = BiodataOne::findOrFail($id);

        return view('admin.pages.register.edit', [
            'biodata' => $biodata,
            'tahun_ajaran' => $tahun_ajaran,
        ]);
    }

    public function update(Request $request,$id)
    {
        $biodata1 = BiodataOne::find($id);

        $biodata1->update([
            'full_name'=>$request->full_name,
            'age'=>$request->age,
            'no_wa'=>$request->no_wa,
            'family'=>$request->family
        ]);

        $user = User::where('id', $biodata1->user_id);
        $user->update([
            'phone' => $request->no_wa,
        ]);

        activity()->log('Mengedit biodata '.$request->full_name);

        return redirect()->route('registers.index')->with('success-edit','Data Berhasil Diedit');
    }

    public function updateTwo(Request $request,$id)
    {
        $biodata1 = BiodataOne::find($request->biodataOne_id);
        $biodata2 = BiodataTwo::find($id);

        $biodata1->update([
            'full_name'=>$request->full_name,
            'age'=>$request->age,
            'no_wa'=>$request->no_wa,
            'family'=>$request->family
        ]);

        $user = User::where('id', $biodata1->user_id);
        $user->update([
            'phone' => $request->no_wa,
        ]);

        $biodata2->update($request->except(['full_name','age','no_wa','family']));
        activity()->log('Mengedit biodata '.$request->full_name);

        return redirect()->route('registers.index')->with('success-edit','Data Berhasil Diedit');
    }


    public function delete($id)
    {
        $data = BiodataOne::findOrFail($id);
        $data->delete();

        ScoreIq::where('user_id', $data->user_id)->delete();
        ScorePersonal::where('user_id', $data->user_id)->delete();
        QuestionIqAnswer::where('user_id', $data->user_id)->delete();
        QuestionPersonalAnswer::where('user_id', $data->user_id)->delete();
        Video::where('user_id', $data->user_id)->delete();
        Interview::where('user_id', $data->user_id)->delete();
        BiodataTwo::where('user_id', $data->user_id)->delete();
        User::where('id', $data->user_id)->delete();

        activity()->log('Menghapus biodata id '.$id);

        return back()->with('success-delete','Berhasil Menghapus Data');
    }

    public function deleteAll(Request $request)
    {
        $ids=$request->get('ids');

        if ($ids != null) {
            foreach ($ids as $id) {
                $data = BiodataOne::find($id);
                $data->delete();
                ScoreIq::where('user_id', $data->user_id)->delete();
                ScorePersonal::where('user_id', $data->user_id)->delete();
                QuestionIqAnswer::where('user_id', $data->user_id)->delete();
                QuestionPersonalAnswer::where('user_id', $data->user_id)->delete();
                Video::where('user_id', $data->user_id)->delete();
                Interview::where('user_id', $data->user_id)->delete();
                BiodataTwo::where('user_id', $data->user_id)->delete();
                User::where('id', $data->user_id)->delete();
            }
            activity()->log('Menghapus semua biodata');

            return redirect()->back()->with('success-delete','Berhasil Menghapus Semua Data');
        }else{
            return redirect()->back();
        }
    }

    public function export()
    {
        return Excel::download(new BiodataOneExport, 'data-user.xlsx');
    }
}