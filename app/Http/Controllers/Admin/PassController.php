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
}
