<?php

namespace App\Http\Controllers\Exam;

use App\Http\Controllers\Controller;
use App\Models\AcademyYear;
use App\Models\Video;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Stage;

class VideoController extends Controller
{
    public function index()
    {
        return view('front.pages.video.index');
    }


    public function videoStore(Request $request)
    {
        $request->validate(['url' => 'required']);
        $tahun_ajaran=AcademyYear::where('is_active', '=', 1)->orderBy('id', 'desc')->pluck('id')->first();
        $stage_id = Stage::whereHas('academy_year', function($query){
            $query->where('is_active', true);
        })->orderBy('id', 'desc')->pluck('id')->first();

        $request->merge(['user_id'=>Auth::user()->id, 'stage_id' => $stage_id, 'academy_year_id'=>$tahun_ajaran]);
        Video::create($request->all());

        $data = [
            'sender' => Setting::pluck('no_msg'),
            'reciver' => Auth::user()->phone,
            'message' => 'Anda telah selesai melaksanakan tes _Tahap Keempat_.

Informasi hasil tes akan kami umumkan melalui web dan nomor whatsapp ini, *Pastikan whatsapp selalu aktif*.

Anda baru bisa lanjut mengikuti tes _Tahap Kelima_ jika dinyatakan lolos di tes _Tahap Keempat_'


        ];
        sendMessage($data);
        return redirect()->route('user-dashboard');
    }
}