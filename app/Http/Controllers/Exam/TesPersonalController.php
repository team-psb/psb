<?php

namespace App\Http\Controllers\Exam;

use App\Http\Controllers\Controller;
use App\Models\AcademyYear;
use App\Models\QuestionPersonal;
use App\Models\QuestionPersonalAnswer;
use App\Models\ScorePersonal;
use App\Models\Setting;
use App\Models\Stage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TesPersonalController extends Controller
{
    public function personal()
    {
        // $limit = Setting::pluck('question_personal_value')->first();
        // $soal = QuestionPersonal::inRandomOrder()->limit($limit)->get();
        // $kepribadian = $soal->paginate(10);
        
        $soal = QuestionPersonal::inRandomOrder()->limit(50)->get();
        $kepribadian = $soal->chunk(10);

        return view('front.pages.tesPersonality.index1',compact('kepribadian'));
    }

    public function personalStore(Request $request)
    {
        $jawaban=$request->input('pilihan');
        $tahun_ajaran=AcademyYear::where('is_active','=', 1)->orderBy('id', 'desc')->pluck('id')->first();
        $stage_id = Stage::whereHas('academy_year', function($query){
            $query->where('is_active', true);
        })->orderBy('id', 'desc')->pluck('id')->first();        

        $notif = Setting::get()->first();
        
        if($jawaban != null){
            $nilai = 0 ;
            foreach ($jawaban as $key => $value) {
                $cek=QuestionPersonal::where('id','=',$key)->first();
                
                if ($value == 'a') {
                    $nilai= $nilai + $cek->poin_a;
                    QuestionPersonalAnswer::create([
                        'user_id' => Auth::user()->id,
                        'question_personal_id' => $cek->id,
                        'answer' => 'a'
                    ]);
                }
                elseif ($value == 'b') {
                    $nilai= $nilai + $cek->poin_b;
                    QuestionPersonalAnswer::create([
                        'user_id' => Auth::user()->id,
                        'question_personal_id' => $cek->id,
                        'answer' => 'b'
                    ]);
                }
                elseif ($value == 'c') {
                    $nilai= $nilai + $cek->poin_c;
                    QuestionPersonalAnswer::create([
                        'user_id' => Auth::user()->id,
                        'question_personal_id' => $cek->id,
                        'answer' => 'c'
                    ]);
                }
                elseif ($value == 'd') {
                    $nilai= $nilai + $cek->poin_d;
                    QuestionPersonalAnswer::create([
                        'user_id' => Auth::user()->id,
                        'question_personal_id' => $cek->id,
                        'answer' => 'd'
                    ]);
                }
                elseif ($value == 'e') {
                    $nilai= $nilai + $cek->poin_e;
                    QuestionPersonalAnswer::create([
                        'user_id' => Auth::user()->id,
                        'question_personal_id' => $cek->id,
                        'answer' => 'e'
                    ]);
                }
            }
        
            ScorePersonal::create([
                'user_id' => Auth::user()->id,
                'stage_id' => $stage_id,
                'academy_year_id'=>$tahun_ajaran,
                'score_question_personal'=>$nilai,
            ]);
            $data = [
                'sender' => Setting::pluck('no_msg'),
                'reciver' => Auth::user()->phone,
                'message' => '*'.Auth::user()->name.'*, '. $notif->complete_tahap3
            ];

            sendMessage($data);
            return redirect()->route('success');
        }else{
            ScorePersonal::create([
                'user_id'=>Auth::user()->id,
                'stage_id' => $stage_id,
                'academy_year_id'=>$tahun_ajaran,
                'score_question_personal'=>0,
            ]);
            $data = [
                'sender' => Setting::pluck('no_msg'),
                'reciver' => Auth::user()->phone,
                'message' => '*'.Auth::user()->name.'*, '. $notif->complete_tahap3
            ];
            sendMessage($data);

            return redirect()->route('user-dashboard');
        }
    } 
}
