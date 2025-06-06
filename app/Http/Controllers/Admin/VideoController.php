<?php

namespace App\Http\Controllers\Admin;

use App\Exports\VideoExport;
use App\Http\Controllers\Controller;
use App\Models\AcademyYear;
use App\Models\Interview;
use App\Models\ScorePersonal;
use App\Models\Stage;
use App\Models\Video;
use App\Models\Setting;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class VideoController extends Controller
{

    public function index()
    {
        $tahun_ajaran = AcademyYear::where('is_active', true)->orderBy('id','desc')->first()->id;
        $stages = Stage::get();

        if (request()->get('stage_id') && request()->get('stage_id') != null) {
            $data = Video::where('academy_year_id', $tahun_ajaran)->with(['academy_year' => function ($query) {
                $query->where('stage_id', '=', request()->get('stage_id'));
            }, 'user.biodataOne'])->orderBy('id', 'desc');
        } else {
            $data = Video::where('academy_year_id', $tahun_ajaran)->with(['academy_year' => function ($query) {
                $query->where('is_active', '=', true);
            }, 'user.biodataOne'])->orderBy('id', 'desc');
        }

        $data = $data->get();
        $videos = $data->where('academy_year', '!=', null);
        return view('admin.pages.video.index', compact('videos', 'stages', 'tahun_ajaran'));
    }

    public function delete($id)
    {
        $tahun_ajaran = AcademyYear::where('is_active', true)->orderBy('id','desc')->first()->id;
        $data = Video::findOrFail($id);
        $scorePersonal = ScorePersonal::where('user_id', $data->user_id)->where('academy_year_id', $tahun_ajaran)->first();
        $scorePersonal->update([
            'status' => null
        ]);
        $data->delete();
        activity()->log('Menghapus video id ' . $id);

        return back()->with('success-delete', 'Berhasil Menghapus Data');
    }

    public function deleteAll(Request $request)
    {
        $tahun_ajaran = AcademyYear::where('is_active', true)->orderBy('id','desc')->first()->id;
        $ids = $request->get('ids');

        if ($ids != null) {
            foreach ($ids as $id) {
                $data = Video::find($id);
                $scorePersonal = ScorePersonal::where('user_id', $data->user_id)->where('academy_year_id', $tahun_ajaran)->first();
                $scorePersonal->update([
                    'status' => null
                ]);
                $data->delete();
            }
            activity()->log('Menghapus semua data video');

            return redirect()->route('videos.index')->with('success-delete', 'Berhasil Menghapus Semua Data');
        } else {
            return redirect()->back();
        }
    }

    public function lolos($id)
    {
        $item = Video::findOrFail($id);
        $item->update(['status' => 'lolos']);

        Interview::create([
            'user_id' => $item->user_id,
            'academy_year_id' => $item->academy_year_id,
            'stage_id' => $item->stage_id,
        ]);

        $notif = Setting::get()->first();


        //         $data = [
        //
        //             'target' => $item->user->phone,
        //             'message' => 'Selamat, *' . $item->user->name . '!*

        // Anda dinyatakan *Lolos* dan bisa lanjut ke _Tahap Kelima_

        // Untuk tes _Tahap Kelima_ adalah *wawancara*, Kami akan segera memberitahu anda mengenai waktunya

        // *Pastikan selalu mengecek whatsapp agar tidak melewatkan jadwal yang kami berikan*'
        //         ];
        $data = [

            'target' => $item->user->phone,
            'message' => '*' . $item->user->name . '*, ' . $notif->notif_tahap4
        ];
        sendMessage($data);

        return redirect()->route('videos.index')->with('success-edit', 'Berhasil Mengganti Status Data');
    }

    public function tidaklolos($id)
    {
        $tahun_ajaran = AcademyYear::where('is_active', true)->orderBy('id','desc')->first()->id;
        $item = Video::findOrFail($id);
        $item->update(['status' => 'tidak']);

        $cek = Interview::where('user_id', '=', $item->user_id)->where('academy_year_id', $tahun_ajaran)->get();
        if (isset($cek)) {
            Interview::where('user_id', '=', $item->user_id)->where('academy_year_id', $tahun_ajaran)->delete();
        }
        //         $data = [
        //
        //             'target' => $item->user->phone,
        //             'message' => 'Mohon maaf, *' . $item->user->name . '!*

        // Anda dinyatakan *Tidak Lolos* dan tidak bisa lanjut ke _Tahap Kelima_

        // Tetap Semangka (Semangat Karena Allah !)'
        //         ];

        $notif = Setting::get()->first();
        $data = [

            'target' => $item->user->phone,
            'message' => '*' . $item->user->name . '*, ' . $notif->notif_tahap4_failed
        ];
        sendMessage($data);

        return redirect()->route('videos.index')->with('success-edit', 'Berhasil Mengganti Status Data');
    }

    public function passAll(Request $request)
    {
        $ids = $request->get('ids');
        if ($ids != null) {
            foreach ($ids as $id) {
                $item = Video::findOrFail($id);
                $item->update(['status' => 'lolos']);
                Interview::create([
                    'user_id' => $item->user_id,
                    'academy_year_id' => $item->academy_year_id,
                    'stage_id' => $item->stage_id,
                ]);
                //                 $data = [
                //
                //                 'target' => $item->user->phone,
                //                 'message' => 'Selamat, *' . $item->user->name . '!*

                // Anda dinyatakan *Lolos* dan bisa lanjut ke _Tahap Kelima_

                // Untuk tes _Tahap Kelima_ adalah *wawancara*, Kami akan segera memberitahu anda mengenai waktunya

                // *Pastikan selalu mengecek whatsapp agar tidak melewatkan jadwal yang kami berikan*'
                //                 ];
                $notif = Setting::get()->first();

                $data = [

                    'target' => $item->user->phone,
                    'message' => '*' . $item->user->name . '*, ' . $notif->notif_tahap4
                ];
                sendMessage($data);
            }
            return redirect()->route('videos.index')->with('success-edit', 'Berhasil Mengganti Semua Status Data');
        } else {
            return redirect()->back();
        }
    }

    public function nonpassAll(Request $request)
    {
        $tahun_ajaran = AcademyYear::where('is_active', true)->orderBy('id','desc')->first()->id;
        $ids = $request->get('ids');
        if ($ids != null) {
            foreach ($ids as $id) {
                $item = Video::findOrFail($id);
                $item->update(['status' => 'tidak']);

                $cek = Interview::where('user_id', '=', $item->user_id)->where('academy_year_id', $tahun_ajaran)->get();
                if (isset($cek)) {
                    Interview::where('user_id', '=', $item->user_id)->where('academy_year_id', $tahun_ajaran)->delete();
                }
                //                 $data = [
                //
                //             'target' => $item->user->phone,
                //             'message' => 'Mohon maaf, *' . $item->user->name . '!*

                // Anda dinyatakan *Tidak Lolos* dan tidak bisa lanjut ke _Tahap Kelima_

                // Tetap Semangka (Semangat Karena Allah !)'
                //         ];
                $notif = Setting::get()->first();

                $data = [

                    'target' => $item->user->phone,
                    'message' => '*' . $item->user->name . '*, ' . $notif->notif_tahap4_failed
                ];
                sendMessage($data);
            }

            return redirect()->route('videos.index')->with('success-edit', 'Berhasil Mengganti Semua Status Data');
        } else {
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