<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcademyYear;
use App\Models\QuestionIq;
use App\Models\QuestionPersonal;
use App\Models\Stage;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $academies = AcademyYear::get();
        $stages = Stage::get();
        $iqs = QuestionIq::get();
        $personals = QuestionPersonal::get();

        return view('admin.pages.setting.index', [
            'academies' => $academies,
            'stages' => $stages,
            'iqs' => $iqs,
            'personals' => $personals,
        ]);
    }

    public function stageStore(Request $request)
    {
        $data = $request->all();

        Stage::create($data);

        return back();
    }

    public function stageEdit($id)
    {
        $stage = Stage::findOrFail($id);

        return view('admin.pages.setting.stage_edit', [
            'stage' => $stage
        ]);
    }

    public function stageUpdate(Request $request, $id)
    {
        $data = $request->all();

        $request->validate([
            'name' => 'required',
        ]);

        Stage::findOrFail($id)->update($data);
        activity()->log('Mengedit  data Gelombang id '.$id);

        return back();
    }

    public function stageDelete($id)        
    {
        $data = Stage::findOrFail($id);
        $data->delete();
        return back();
    }
}
