<?php

namespace App\Http\Controllers\Admin;

use App\Exports\VideoExport;
use App\Http\Controllers\Controller;
use App\Models\Interview;
use App\Models\Stage;
use App\Models\Video;
use App\Models\Setting;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class VideoController extends Controller
{

    public function index()
    {
        $stages = Stage::get();
        
        if (request()->get('stage_id') && request()->get('stage_id') != null){
            $data = Video::with(['academy_year'=>function($query){
                $query->where('stage_id','=', request()->get('stage_id'));
            },'user.biodataOne'])->orderBy('id','desc');
        }else {
            $data = Video::with(['academy_year'=>function($query){
                $query->where('is_active','=', true);
            },'user.biodataOne'])->orderBy('id','desc');
        }

        $data = $data->get();
        $videos = $data->where('academy_year', '!=', null);
        return view('admin.pages.video.index',compact('videos', 'stages'));
    }

    public function delete($id)
    {
        $data = Video::findOrFail($id);
        $data->delete();
        activity()->log('Menghapus video id '.$id);

        return back()->with('success-delete','Berhasil Menghapus Data');
    }

    public function lolos($id)
    {
        $item = Video::findOrFail($id);
        $item->update(['status' => 'lolos']);
        
        Interview::create([
            'user_id'=>$item->user_id,
            'academy_year_id'=>$item->academy_year_id,
            'stage_id'=>$item->stage_id,
        ]);

        $data = [
            'sender' => Setting::pluck('no_msg'),
            'reciver' => $item->user->phone,
            'message' => 'Selamat, *' . $item->user->name . '!*

Anda dinyatakan *Lolos* dan bisa lanjut ke _Tahap Kelima_

Untuk tes _Tahap Kelima_ adalah *wawancara*, Kami akan segera memberitahu anda mengenai waktunya

*Pastikan selalu mengecek whatsapp agar tidak melewatkan jadwal yang kami berikan*' 
        ];
        sendMessage($data);

        return redirect()->route('videos.index')->with('success-edit','Berhasil Mengganti Status Data');
    }

    public function tidaklolos($id)
    {
        $item=Video::findOrFail($id);
        $item->update(['status' => 'tidak']);

        $cek = Interview::where('user_id','=',$item->user_id)->get();
        if (isset($cek)) {
            Interview::where('user_id','=',$item->user_id)->delete();
        }
        $data = [
            'sender' => Setting::pluck('no_msg'),
            'reciver' => $item->user->phone,
            'message' => 'Mohon maaf, *' . $item->user->name . '!*

Anda dinyatakan *Tidak Lolos* dan tidak bisa lanjut ke _Tahap Kelima_

Tetap Semangka (Semangat Karena Allah !)' 
        ];
        sendMessage($data);

        return redirect()->route('videos.index')->with('success-edit','Berhasil Mengganti Status Data');
    }

    public function passAll(Request $request)
    {
        $ids=$request->get('ids');
        if ($ids != null) {
            foreach ($ids as $id) {
                $item = Video::findOrFail($id);
                $item->update(['status'=>'lolos']);
                Interview::create([
                    'user_id'=>$item->user_id,
                    'academy_year_id'=>$item->academy_year_id,
                    'stage_id'=>$item->stage_id,
                ]);
                $data = [
                'sender' => Setting::pluck('no_msg'),
                'reciver' => $item->user->phone,
                'message' => 'Selamat, *' . $item->user->name . '!*

Anda dinyatakan *Lolos* dan bisa lanjut ke _Tahap Kelima_

Untuk tes _Tahap Kelima_ adalah *wawancara*, Kami akan segera memberitahu anda mengenai waktunya

*Pastikan selalu mengecek whatsapp agar tidak melewatkan jadwal yang kami berikan*' 
                ];
                sendMessage($data);
            }
            return redirect()->route('videos.index')->with('success-edit','Berhasil Mengganti Semua Status Data');
        }else{
            return redirect()->back();
        }
    }

    public function nonpassAll(Request $request)
    {
        $ids=$request->get('ids');
        if ($ids != null) {
            foreach ($ids as $id) {
                $item = Video::findOrFail($id);
                $item->update(['status'=>'tidak']);

                $cek = Interview::where('user_id','=',$item->user_id)->get();
                if (isset($cek)) {
                    Interview::where('user_id','=',$item->user_id)->delete();
                }
                $data = [
            'sender' => Setting::pluck('no_msg'),
            'reciver' => $item->user->phone,
            'message' => 'Mohon maaf, *' . $item->user->name . '!*

Anda dinyatakan *Tidak Lolos* dan tidak bisa lanjut ke _Tahap Kelima_

Tetap Semangka (Semangat Karena Allah !)' 
        ];
        sendMessage($data);
            }

            return redirect()->route('videos.index')->with('success-edit','Berhasil Mengganti Semua Status Data');
        }else{
            return redirect()->back();
        }
    }

    public function deleteAll(Request $request)
    {
        $ids=$request->get('ids');
        
        if ($ids != null) {
            foreach ($ids as $id) {
                Video::find($id)->delete();
            }
            activity()->log('Menghapus semua data video');

            return redirect()->route('videos.index')->with('success-delete','Berhasil Menghapus Semua Data');
        }else{
            return redirect()->back();
        }
    }

    public function filterreset()
    {
        return redirect()->route('videos.index');
    }

    public function export() 
    {
        return Excel::download(new VideoExport, 'data video.xlsx');
    }
}
