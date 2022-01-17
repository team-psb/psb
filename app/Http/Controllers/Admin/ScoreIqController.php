<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stage;
use App\Models\ScoreIq;
use App\Models\Setting;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ScoreIqExport;
class ScoreIqController extends Controller
{
    public function index()
    {
        $stages = Stage::get();
        
        if (request()->get('stage_id') && request()->get('stage_id') != null){
            $data = ScoreIq::with(['academy_year'=>function($query){
                $query->where('stage_id','=', request()->get('stage_id'));
            },'user.biodataOne'])->orderBy('id','desc');
        }else {
            $data = ScoreIq::with(['academy_year'=>function($query){
                $query->where('is_active','=', true);
            },'user.biodataOne'])->orderBy('id','desc');
        }
        

        if((request()->get('score_test_iq_min') && request()->get('score_test_iq_min') != null) && (request()->get('score_test_iq_max') && request()->get('score_test_iq_max') != null)){
            $data = $data->whereBetween('score_question_iq',[request()->get('score_test_iq_min'),request()->get('score_test_iq_max')]);
        }

        $data = $data->get();
        $scores = $data->where('academy_year', '!=', null);
        return view('admin.pages.scoreIq.index',compact('scores', 'stages'));
    }

    public function delete($id)
    {
        $data = ScoreIq::findOrFail($id);
        $data->delete();
        activity()->log('Menghapus tes nilai id '.$id);

        return back();
    }

    public function setStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:lolos,tidak'
        ]);

        $item = ScoreIq::findOrFail($id);
        $item->status = $request->status;
        $item->save();

        // Whatsapp Gateway
        if ($item->status == 'lolos'){
            $link =  route('user-third-tes');

        $data = [
            'sender' => Setting::pluck('no_msg'),
            'reciver' => $item->user->phone,
            'message' => 'Selamat, *' . $item->user->name . '!*

Anda dinyatakan *Lolos* dan bisa lanjut ke _Tahap Ketiga_

Untuk melakukan tes _Tahap Ketiga_, Silahkan anda klik link berikut: ' .$link 
        ];
        sendMessage($data);
        } else {
        $data = [
            'sender' => Setting::pluck('no_msg'),
            'reciver' => $item->user->phone,
            'message' => 'Mohon maaf, *' . $item->user->name . '!*

Anda dinyatakan *Tidak Lolos* dan tidak bisa lanjut ke _Tahap Ketiga_

Tetap Semangka (Semangat Karena Allah !)' 
        ];
        sendMessage($data);
        }
        return redirect()->route('scoreIq.index')->with('success-edit', 'Berhasil Mengganti Status Data');
    }

    public function passAll(Request $request)
    {
        $link = route('user-third-tes');
        $ids=$request->get('ids');
        if ($ids != null) {
            foreach ($ids as $id) {
                $item = ScoreIq::find($id);
                ScoreIq::find($id)->update(['status'=>'lolos']);
                $data = [
                'sender' => Setting::pluck('no_msg'),
                'reciver' => $item->user->phone,
                'message' => 'Selamat, *' . $item->user->name . '!*

Anda dinyatakan *Lolos* dan bisa lanjut ke _Tahap Ketiga_

Untuk melakukan tes _Tahap Ketiga_, Silahkan anda klik link berikut: ' .$link
        ];
        sendMessage($data);
            }
            return redirect()->route('scoreIq.index')->with('success-edit','Berhasil Mengganti Semua Status Data');
        }else{
            return redirect()->back();
        }
    }

    public function nonpassAll(Request $request)
    {
        $ids=$request->get('ids');
        if ($ids != null) {
            foreach ($ids as $id) {
                $item = ScoreIq::find($id);
                ScoreIq::find($id)->update(['status'=>'tidak']);
                $data = [
                'sender' => Setting::pluck('no_msg'),
                'reciver' => $item->user->phone,
                'message' => 'Mohon maaf, *' . $item->user->name . '!*

Anda dinyatakan *Tidak Lolos* dan tidak bisa lanjut ke _Tahap Ketiga_

Tetap Semangka (Semangat Karena Allah !)'
        ];
        sendMessage($data);
            }
            return redirect()->route('scoreIq.index')->with('success-edit','Berhasil Mengganti Semua Status Data');
        }else{
            return redirect()->back();
        }
    }

    public function deleteAll(Request $request)
    {
        $ids=$request->get('ids');
        
        if ($ids != null) {
            foreach ($ids as $id) {
                ScoreIq::find($id)->delete();
            }
        activity()->log('Menghapus semua data tes nilai');

            return redirect()->route('scoreIq.index')->with('success-delete','Berhasil Menghapus Semua Status Data');
        }else{
            return redirect()->back();
        }
    }

    public function filter()
    {
        return view('admin.pages.score.filter');
    }

    public function filterreset()
    {
        return redirect()->route('scoreIq.index');
    }

    public function export() 
    {
        return Excel::download(new ScoreIqExport, 'data nilai iq.xlsx');
    }
}
