<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::get();

        return view('admin.pages.video.index', [
            'videos' => $videos
        ]);
    }

    public function delete($id)
    {
        $data = Video::findOrFail($id);
        $data->delete();

        return back();
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
}
