<?php

namespace App\Http\Controllers\Admin;

use App\Exports\InterviewExport;
use App\Http\Controllers\Controller;
use App\Models\AcademyYear;
use App\Models\Interview;
use Illuminate\Http\Request;
use App\Models\Pass;
use App\Models\Stage;
use App\Models\Setting;
use App\Models\Video;
use Maatwebsite\Excel\Facades\Excel;

class InterviewController extends Controller
{
    public function index()
    {
        $tahun_ajaran = AcademyYear::where('is_active', true)->orderBy('id','desc')->first()->id;
        $stages = Stage::get();

        if (request()->get('stage_id') && request()->get('stage_id') != null) {
            $data = Interview::where('academy_year_id', $tahun_ajaran)->with(['academy_year' => function ($query) {
                $query->where('stage_id', '=', request()->get('stage_id'));
            }, 'user.biodataOne'])->orderBy('id', 'desc');
        } else {
            $data = Interview::where('academy_year_id', $tahun_ajaran)->with(['academy_year' => function ($query) {
                $query->where('is_active', '=', true);
            }, 'user.biodataOne'])->orderBy('id', 'desc');
        }

        $data = $data->get();
        $interviews = $data->where('academy_year', '!=', null);
        return view('admin.pages.interview.index', compact('interviews', 'stages', 'tahun_ajaran'));
    }

    public function delete($id)
    {
        $data = Pass::findOrFail($id);
        $video = Video::where('user_id', $data->user_id)->first();
        $video->update([
            'status' => null
        ]);

        $data->delete();
        activity()->log('Menghapus wawancara id ' . $id);

        return back()->with('success-delete', 'Berhasil Menghapus Data');
    }

    public function setStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:lolos,tidak'
        ]);

        $item = Interview::findOrFail($id);
        $item->status = $request->status;
        $item->save();

        $notif = Setting::get()->first();

        // Whatsapp Gateway
        if ($item->status == 'lolos') {
            //         $data = [
            //
            //             'target' => $item->user->phone,
            //             'message' => 'Selamat, *' . $item->user->name . '!*

            // Anda dinyatakan *Lolos* Sebagai calon santri Pondok Mahir Teknologi

            // Untuk informasi selanjutnya akan kami kirim melalui WhatsApp, *Pastikan whatsapp selalu aktif*.'
            //         ];
            $data = [

                'target' => $item->user->phone,
                'message' => '*' . $item->user->name . '*, ' . $notif->notif_tahap5_passed
            ];
            sendMessage($data);
        } else {
            //         $data = [
            //
            //             'target' => $item->user->phone,
            //             'message' => 'Mohon maaf,' . $item->user->name . '!

            // Anda dinyatakan *Tidak Lolos* pada sesi wawancara

            // Tetap Semangka (Semangat Karena Allah !)'
            //         ];
            $data = [

                'target' => $item->user->phone,
                'message' => '*' . $item->user->name . '*, ' . $notif->notif_tahap5_failed
            ];
            sendMessage($data);
        }
        return redirect()->route('interviews.index')->with('success-edit', 'Berhasil Mengganti Status Data');
    }

    public function passAll(Request $request)
    {
        $ids = $request->get('ids');
        if ($ids != null) {
            foreach ($ids as $id) {
                $item = Pass::find($id);
                Pass::find($id)->update(['status' => 'lolos']);
                //                 $data = [
                //
                //                     'target' => $item->user->phone,
                //                     'message' => 'Selamat, *' . $item->user->name . '!*

                // Anda dinyatakan *Lolos* Sebagai calon santri Pondok Mahir Teknologi

                // Untuk informasi selanjutnya akan kami kirim melalui WhatsApp, *Pastikan whatsapp selalu aktif*.'
                //                 ];
                $notif = Setting::get()->first();
                $data = [

                    'target' => $item->user->phone,
                    'message' => '*' . $item->user->name . '*, ' . $notif->notif_tahap5_passed
                ];
                sendMessage($data);
            }

            return redirect()->route('interviews.index')->with('success-edit', 'Berhasil Mengganti Semua Status Data');
        } else {
            return redirect()->back();
        }
    }

    public function nonpassAll(Request $request)
    {
        $ids = $request->get('ids');
        if ($ids != null) {
            foreach ($ids as $id) {
                $item = Pass::find($id);
                Pass::find($id)->update(['status' => 'tidak']);
                //                 $data = [
                //
                //                     'target' => $item->user->phone,
                //                     'message' => 'Mohon maaf,' . $item->user->name . '!

                // Anda dinyatakan *Tidak Lolos* pada sesi *Wawancara*

                // Tetap Semangka (Semangat Karena Allah !)'
                //                 ];
                $notif = Setting::get()->first();
                $data = [

                    'target' => $item->user->phone,
                    'message' => '*' . $item->user->name . '*, ' . $notif->notif_tahap5_failed
                ];
                sendMessage($data);
            }

            return redirect()->route('interviews.index')->with('success-edit', 'Berhasil Mengganti Semua Status Data');
        } else {
            return redirect()->back();
        }
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->get('ids');

        if ($ids != null) {
            foreach ($ids as $id) {
                $data = Pass::find($id);
                $video = Video::where('user_id', $data->user_id)->first();
                $video->update([
                    'status' => null
                ]);
                $data->delete();
            }
            activity()->log('Menghapus semua wawancara');

            return redirect()->route('interviews.index')->with('success-delete', 'Berhasil Mengganti Semua Status Data');
        } else {
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