<?php

namespace App\Http\Controllers\Exam;

use App\Http\Controllers\Controller;
use App\Models\AcademyYear;
use App\Models\QuestionIq;
use App\Models\QuestionPersonal;
use App\Models\Score;
use App\Models\ScoreIq;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Stage;
use Illuminate\Pagination\LengthAwarePaginator;

class TesIqController extends Controller
{
    public function iq(Request $request){
        // $limit = Setting::pluck('question_iq_value')->first();
        // $question   = QuestionIq::inRandomOrder()->limit($limit)->get();
        // $question_iq = $question->paginate(10);

        $soal = QuestionIq::inRandomOrder()->limit(50)->get();
        $question_iq = $soal->chunk(10);

        return view('front.pages.tesIq.index1', compact('question_iq'));
    }

    public function iqStore(Request $request){
        $jawaban=$request->input('pilihan');
        $tahun_ajaran=AcademyYear::where('is_active','=', 1)->orderBy('id', 'desc')->pluck('id')->first();
        $stage_id = Stage::whereHas('academy_year', function($query){
            $query->where('is_active', true);
        })->orderBy('id', 'desc')->pluck('id')->first();
        
        $notif = Setting::get()->first();

        if($jawaban != null){
            $jawaban_benar = null;
            $jawaban_salah = null;

            foreach ($jawaban as $key => $value) {
                $cek = QuestionIq::where('id','=',$key)->where('answer_key','=',$value)->get();
                $benar = count($cek);
                
                if($benar){
                    $jawaban_benar++;
                }else{
                    $jawaban_salah++;
                }
            }

            $nilai = $jawaban_benar*2;


            ScoreIq::create([
                'user_id' => Auth::user()->id,
                'stage_id' => $stage_id,
                'academy_year_id'=>$tahun_ajaran,
                'score_question_iq'=>$nilai,
            ]);
            $data = [
                'sender' => Setting::pluck('no_msg'),
                'reciver' => Auth::user()->phone,
                'message' => '*'.Auth::user()->name.'*, '. $notif->complete_tahap2
            ];
            sendMessage($data);

            return redirect()->route('success');
        }else{
            ScoreIq::create([
                'user_id'=>Auth::user()->id,
                'stage_id' => $stage_id,
                'academy_year_id'=>$tahun_ajaran,
                'score_question_iq'=>0,
            ]);
            $data = [
                'sender' => Setting::pluck('no_msg'),
                'reciver' => Auth::user()->phone,
                'message' => '*'.Auth::user()->name.'*, '. $notif->complete_tahap2
            ];
            sendMessage($data);
            
            return redirect()->route('user-dashboard');
        }
    }
}