<?php

namespace App\Http\Controllers\Admin;

use App\Exports\VideoExport;
use App\Http\Controllers\Controller;
use App\Models\Stage;
use App\Models\Video;
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

        return back();
    }

    public function setStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:lolos,tidak'
        ]);

        $item = Video::findOrFail($id);
        $item->status = $request->status;
        $item->save();

        return redirect()->route('videos.index')->with('success-edit', 'Berhasil Mengganti Status Data');
    }

    public function passAll(Request $request)
    {
        $ids=$request->get('ids');
        if ($ids != null) {
            foreach ($ids as $id) {
                Video::find($id)->update(['status'=>'lolos']);
            }

            return redirect()->route('videos.index');
        }else{
            return redirect()->back();
        }
    }

    public function nonpassAll(Request $request)
    {
        $ids=$request->get('ids');
        if ($ids != null) {
            foreach ($ids as $id) {
                Video::find($id)->update(['status'=>'tidak']);
            }

            return redirect()->route('videos.index');
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

            return redirect()->route('videos.index');
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
