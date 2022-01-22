<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcademyYear;
use App\Models\QuestionIq;
use App\Models\QuestionPersonal;
use App\Models\Setting;
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
        $settings = Setting::get();

        return view('admin.pages.setting.index', [
            'academies' => $academies,
            'stages' => $stages,
            'iqs' => $iqs,
            'personals' => $personals,
            'settings' => $settings,
        ]);
    }

    public function iqValue(Request $request){
        $data = $request->all();
        $setting = Setting::get()->first();
        if (isset($setting)) {
            $setting->update([
                'question_iq_value' => $request->question_iq_value
            ]);
        }else{
            Setting::create($data);
        }
        return back();
    }

    public function personalValue(Request $request){
        $data = $request->all();
        $setting = Setting::get()->first();
        if (isset($setting)) {
            $setting->update([
                'question_personal_value' => $request->question_personal_value
            ]);
        }else{
            Setting::create($data);
        }
        return back();
    }

    public function announcValue(Request $request){
        $data = $request->all();
        $setting = Setting::get()->first();
        if (isset($setting)) {
            $setting->update([
                'announcement' => $request->announc
            ]);
        }else{
            Setting::create($data);
        }
        return back();
    }

    public function noMessage(Request $request){
        $data = $request->all();
        $setting = Setting::get()->first();
        if (isset($setting)) {
            $setting->update([
                'no_msg' => $request->no_msg
            ]);
        }else{
            Setting::create($data);
        }
        return back();
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


    // Notif Wa
    public function biodataPass(Request $request){
        $data = $request->all();
        $setting = Setting::get()->first();
        if (isset($setting)) {
            $setting->update([
                'notif_tahap1' => $request->notif_tahap1
            ]);
        }else{
            Setting::create($data);
        }
        return back();
    }
    
    public function biodataFailed(Request $request){
        $data = $request->all();
        $setting = Setting::get()->first();
        if (isset($setting)) {
            $setting->update([
                'notif_tahap1_failed' => $request->notif_tahap1_failed
            ]);
        }else{
            Setting::create($data);
        }
        return back();
    }
    
    public function iqPass(Request $request){
        $data = $request->all();
        $setting = Setting::get()->first();
        if (isset($setting)) {
            $setting->update([
                'notif_tahap2' => $request->notif_tahap2
            ]);
        }else{
            Setting::create($data);
        }
        return back();
    }
    
    public function iqFailed(Request $request){
        $data = $request->all();
        $setting = Setting::get()->first();
        if (isset($setting)) {
            $setting->update([
                'notif_tahap2_failed' => $request->notif_tahap2_failed
            ]);
        }else{
            Setting::create($data);
        }
        return back();
    }

    public function personalPass(Request $request){
        $data = $request->all();
        $setting = Setting::get()->first();
        if (isset($setting)) {
            $setting->update([
                'notif_tahap3' => $request->notif_tahap3
            ]);
        }else{
            Setting::create($data);
        }
        return back();
    }
    
    public function personalFailed(Request $request){
        $data = $request->all();
        $setting = Setting::get()->first();
        if (isset($setting)) {
            $setting->update([
                'notif_tahap3_failed' => $request->notif_tahap3_failed
            ]);
        }else{
            Setting::create($data);
        }
        return back();
    }

    public function videoPass(Request $request){
        $data = $request->all();
        $setting = Setting::get()->first();
        if (isset($setting)) {
            $setting->update([
                'notif_tahap4' => $request->notif_tahap4
            ]);
        }else{
            Setting::create($data);
        }
        return back();
    }
    
    public function videoFailed(Request $request){
        $data = $request->all();
        $setting = Setting::get()->first();
        if (isset($setting)) {
            $setting->update([
                'notif_tahap4_failed' => $request->notif_tahap4_failed
            ]);
        }else{
            Setting::create($data);
        }
        return back();
    }

    public function interviewPass(Request $request){
        $data = $request->all();
        $setting = Setting::get()->first();
        if (isset($setting)) {
            $setting->update([
                'notif_tahap5' => $request->notif_tahap5
            ]);
        }else{
            Setting::create($data);
        }
        return back();
    }
    
    public function studentPass(Request $request){
        $data = $request->all();
        $setting = Setting::get()->first();
        if (isset($setting)) {
            $setting->update([
                'notif_tahap5_passed' => $request->notif_tahap5_passed
            ]);
        }else{
            Setting::create($data);
        }
        return back();
    }

    public function studentFailed(Request $request){
        $data = $request->all();
        $setting = Setting::get()->first();
        if (isset($setting)) {
            $setting->update([
                'notif_tahap5_failed' => $request->notif_tahap5_failed
            ]);
        }else{
            Setting::create($data);
        }
        return back();
    }
}
