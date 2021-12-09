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
}
