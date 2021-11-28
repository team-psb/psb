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
}
