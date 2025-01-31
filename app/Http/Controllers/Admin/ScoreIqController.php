<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stage;
use App\Models\ScoreIq;
use App\Models\Setting;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ScoreIqExport;
use App\Models\AcademyYear;
use App\Models\BiodataOne;
use App\Models\BiodataTwo;
use App\Models\QuestionIqAnswer;
use App\Models\QuestionPersonalAnswer;
use App\Models\User;

class ScoreIqController extends Controller
{
    public function index()
    {
        $tahun_ajaran = AcademyYear::where('is_active', true)->orderBy('id','desc')->first()->id;
        $stages = Stage::get();

        if (request()->get('stage_id') && request()->get('stage_id') != null) {
            $data = ScoreIq::where('academy_year_id', $tahun_ajaran)->with(['academy_year' => function ($query) {
                $query->where('stage_id', '=', request()->get('stage_id'));
            }, 'user.biodataOne'])->orderBy('id', 'desc');
        } else {
            $data = ScoreIq::where('academy_year_id', $tahun_ajaran)->with(['academy_year' => function ($query) {
                $query->where('is_active', '=', true);
            }, 'user.biodataOne'])->orderBy('id', 'desc');
        }


        if ((request()->get('score_test_iq_min') && request()->get('score_test_iq_min') != null) && (request()->get('score_test_iq_max') && request()->get('score_test_iq_max') != null)) {
            $data = $data->whereBetween('score_question_iq', [request()->get('score_test_iq_min'), request()->get('score_test_iq_max')]);
        }

        $data = $data->get();
        $scores = $data->where('academy_year', '!=', null);
        return view('admin.pages.scoreIq.index', compact('scores', 'stages', 'tahun_ajaran'));
    }

    public function answer($id)
    {
        $tahun_ajaran = AcademyYear::where('is_active', true)->orderBy('id','desc')->first()->id;
        $answers = QuestionIqAnswer::where('user_id', $id)->where('academy_year_id', $tahun_ajaran)->get();
        $user = User::find($id);
        return view('admin.pages.scoreIq.answer', compact('answers', 'user', 'tahun_ajaran'));
    }

    public function delete($id)
    {
        $tahun_ajaran = AcademyYear::where('is_active', true)->orderBy('id','desc')->first()->id;
        $data = ScoreIq::findOrFail($id);
        $biodataTwo = BiodataTwo::where('user_id', $data->user_id)->where('academy_year_id', $tahun_ajaran)->first();
        $biodataTwo->update([
            'status' => null
        ]);
        QuestionIqAnswer::where('user_id', $data->user_id)->where('academy_year_id', $tahun_ajaran)->delete();
        $data->delete();
        activity()->log('Menghapus tes nilai id ' . $id);

        return back();
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->get('ids');
        $tahun_ajaran = AcademyYear::where('is_active', true)->orderBy('id','desc')->first()->id;

        if ($ids != null) {
            foreach ($ids as $id) {
                $data = ScoreIq::find($id);
                $biodataTwo = BiodataTwo::where('user_id', $data->user_id)->where('academy_year_id', $tahun_ajaran)->first();
                $biodataTwo->update([
                    'status' => null
                ]);
                QuestionIqAnswer::where('user_id', $data->user_id)->where('academy_year_id', $tahun_ajaran)->delete();
                $data->delete();
            }
            activity()->log('Menghapus semua data tes nilai');

            return redirect()->route('scoreIq.index')->with('success-delete', 'Berhasil Menghapus Semua Status Data');
        } else {
            return redirect()->back();
        }
    }

    public function setStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:lolos,tidak'
        ]);

        $item = ScoreIq::findOrFail($id);
        $item->status = $request->status;
        $item->save();

        $notif = Setting::get()->first();

        // Whatsapp Gateway
        if ($item->status == 'lolos') {
            $link =  route('user-third-tes');

            //         $data = [
            //
            //             'target' => $item->user->phone,
            //             'message' => 'Selamat, *' . $item->user->name . '!*

            // Anda dinyatakan *Lolos* dan bisa lanjut ke _Tahap Ketiga_

            // Untuk melakukan tes _Tahap Ketiga_, Silahkan anda klik link berikut: ' .$link
            //         ];
            $data = [

                'target' => $item->user->phone,
                'message' => '*' . $item->user->name . '*, ' . $notif->notif_tahap2 . ' ' . $link
            ];
            sendMessage($data);
        } else {
            //         $data = [
            //
            //             'target' => $item->user->phone,
            //             'message' => 'Mohon maaf, *' . $item->user->name . '!*

            // Anda dinyatakan *Tidak Lolos* dan tidak bisa lanjut ke _Tahap Ketiga_

            // Tetap Semangka (Semangat Karena Allah !)'
            //         ];
            $data = [

                'target' => $item->user->phone,
                'message' => '*' . $item->user->name . '*, ' . $notif->notif_tahap2_failed
            ];
            sendMessage($data);
        }
        return redirect()->route('scoreIq.index')->with('success-edit', 'Berhasil Mengganti Status Data');
    }

    public function passAll(Request $request)
    {
        $link = route('user-third-tes');
        $ids = $request->get('ids');
        if ($ids != null) {
            foreach ($ids as $id) {
                $item = ScoreIq::find($id);
                ScoreIq::find($id)->update(['status' => 'lolos']);
                //                 $data = [
                //
                //                 'target' => $item->user->phone,
                //                 'message' => 'Selamat, *' . $item->user->name . '!*

                // Anda dinyatakan *Lolos* dan bisa lanjut ke _Tahap Ketiga_

                // Untuk melakukan tes _Tahap Ketiga_, Silahkan anda klik link berikut: ' .$link
                //         ];
                $notif = Setting::get()->first();

                $data = [

                    'target' => $item->user->phone,
                    'message' => '*' . $item->user->name . '*, ' . $notif->notif_tahap2 . ' ' . $link
                ];
                sendMessage($data);
            }
            return redirect()->route('scoreIq.index')->with('success-edit', 'Berhasil Mengganti Semua Status Data');
        } else {
            return redirect()->back();
        }
    }

    public function nonpassAll(Request $request)
    {
        $ids = $request->get('ids');
        if ($ids != null) {
            foreach ($ids as $id) {
                $item = ScoreIq::find($id);
                ScoreIq::find($id)->update(['status' => 'tidak']);
                //                 $data = [
                //
                //                 'target' => $item->user->phone,
                //                 'message' => 'Mohon maaf, *' . $item->user->name . '!*

                // Anda dinyatakan *Tidak Lolos* dan tidak bisa lanjut ke _Tahap Ketiga_

                // Tetap Semangka (Semangat Karena Allah !)'
                //         ];
                $notif = Setting::get()->first();

                $data = [

                    'target' => $item->user->phone,
                    'message' => '*' . $item->user->name . '*, ' . $notif->notif_tahap2_failed
                ];
                sendMessage($data);
            }
            return redirect()->route('scoreIq.index')->with('success-edit', 'Berhasil Mengganti Semua Status Data');
        } else {
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