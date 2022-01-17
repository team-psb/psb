<?php

namespace App\Http\Controllers\Admin;

use App\Exports\InterviewExport;
use App\Http\Controllers\Controller;
use App\Models\Interview;
use Illuminate\Http\Request;
use App\Models\Pass;
use App\Models\Stage;
use App\Models\Setting;
use Maatwebsite\Excel\Facades\Excel;

class InterviewController extends Controller
{
    public function index()
    {
        $stages = Stage::get();
        
        if (request()->get('stage_id') && request()->get('stage_id') != null){
            $data = Interview::with(['academy_year'=>function($query){
                $query->where('stage_id','=', request()->get('stage_id'));
            },'user.biodataOne'])->orderBy('id','desc');
        }else {
            $data = Interview::with(['academy_year'=>function($query){
                $query->where('is_active','=', true);
            },'user.biodataOne'])->orderBy('id','desc');
        }

        $data = $data->get();
        $interviews = $data->where('academy_year', '!=', null);
        return view('admin.pages.interview.index',compact('interviews', 'stages'));
    }

    public function delete($id)
    {
        $data = Pass::findOrFail($id);
        $data->delete();
        activity()->log('Menghapus wawancara id '.$id);

        return back()->with('success-delete','Berhasil Menghapus Data');
    }

    public function setStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:lolos,tidak'
        ]);

        $item = Interview::findOrFail($id);
        $item->status = $request->status;
        $item->save();

        // Whatsapp Gateway
        if ($item->status == 'lolos'){
        $data = [
            'sender' => Setting::pluck('no_msg'),
            'reciver' => $item->user->phone,
            'message' => 'Selamat,' . $item->user->name . '!

Anda dinyatakan *Lolos* Sebagai calon santri Pondok Informatika Al-Madinah

Untuk informasi selanjutnya akan kami kirim melalui WhatsApp, *Pastikan whatsapp selalu aktif*.'
        ];
        sendMessage($data);
        } else {
        $data = [
            'sender' => Setting::pluck('no_msg'),
            'reciver' => $item->user->phone,
            'message' => 'Mohon maaf,' . $item->user->name . '!

Anda dinyatakan *Tidak Lolos* pada sesi wawancara

Tetap Semangka (Semangat Karena Allah !)' 
        ];
        sendMessage($data);
        }
        return redirect()->route('interviews.index')->with('success-edit', 'Berhasil Mengganti Status Data');
    }

    public function passAll(Request $request)
    {
        $ids=$request->get('ids'); 
        if ($ids != null) {
            foreach ($ids as $id) {
                $item = Pass::find($id);
                Pass::find($id)->update(['status'=>'lolos']);
                $data = [
                    'sender' => Setting::pluck('no_msg'),
                    'reciver' => $item->user->phone,
                    'message' => 'Selamat,' . $item->user->name . '!
        
Anda dinyatakan *Lolos* Sebagai calon santri Pondok Informatika Al-Madinah

Untuk informasi selanjutnya akan kami kirim melalui WhatsApp, *Pastikan whatsapp selalu aktif*.'
                ];
                sendMessage($data);
            }

            return redirect()->route('interviews.index')->with('success-edit','Berhasil Mengganti Semua Status Data');
        }else{
            return redirect()->back();
        }
    }

    public function nonpassAll(Request $request)
    {
        $ids=$request->get('ids');
        if ($ids != null) {
            foreach ($ids as $id) {
                $item = Pass::find($id);
                Pass::find($id)->update(['status'=>'tidak']);
                $data = [
                    'sender' => Setting::pluck('no_msg'),
                    'reciver' => $item->user->phone,
                    'message' => 'Mohon maaf,' . $item->user->name . '!
        
Anda dinyatakan *Tidak Lolos* pada sesi wawancara

Tetap Semangka (Semangat Karena Allah !)' 
                ];
                sendMessage($data);
            }

            return redirect()->route('interviews.index')->with('success-edit','Berhasil Mengganti Semua Status Data');
        }else{
            return redirect()->back();
        }
    }

    public function deleteAll(Request $request)
    {
        $ids=$request->get('ids');
        
        if ($ids != null) {
            foreach ($ids as $id) {
                Pass::find($id)->delete();
            }
            activity()->log('Menghapus semua wawancara');

            return redirect()->route('interviews.index')->with('success-delete','Berhasil Mengganti Semua Status Data');
        }else{
            return redirect()->back();
        }
    }

    public function filterreset()
    {
        return redirect()->route('interviews.index');
    }

    public function export() 
    {
        return Excel::download(new InterviewExport, 'data wawancara.xlsx');
    }
}
