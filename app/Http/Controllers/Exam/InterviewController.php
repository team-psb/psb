<?php

namespace App\Http\Controllers\Exam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AcademyYear;
use App\Models\Interview;


class InterviewController extends Controller
{
    public function index()
    {
        return view('front.pages.wawancara.index');
    }
}
