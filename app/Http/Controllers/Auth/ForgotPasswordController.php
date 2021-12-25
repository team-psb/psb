<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\VerifikasiEmail;
use App\Models\User;
use App\Models\VerifyUser;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    public function getWhatsapp()
    {
        return view('auth.whatsappPassword');
    }

    public function postWhatsapp(Request $request)
    {   
        // dd($request);
        $request->validate([
            'phone' => 'required|string',
        ]);

        $validatephone = User::where('phone', $request->phone)->first();

        if (!$validatephone){
            return back()->with('gagal-kirim', 'nomor whatsapp anda belum terdaftar');
        }
        
        $token = bin2hex(random_bytes(8));
        $user = [
            'phone' => $request->phone,
            'token' => $token,
        ];

        // dd($user['token']);
        DB::table('password_resets')->insert($user);

        // Mail::to($user['email'])->send(new VerifikasiEmail($user));

        return back()->with('sukses-buat', 'Link reset Password sudah kami kirim ke nomer Whatsapp anda! '. $request->phone.' dengan token : '.$token);
    }

    public function getPassword($token)
    {
        return  view('auth.resetPassword', compact('token'));
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
            'password' => 'required|string|min:6|max:20'
        ]);

        $validateToken = DB::table('password_resets')->where([
            'phone' => $request->phone,
            'token' => $request->token
        ])->first();

        //dd($validateToken);
        if (!$validateToken) {
            return back()->withInput()->with('error', 'Invalid token!');
        }else {
            User::where('phone', $request->phone)->update([
                'password' => bcrypt($request->password)
            ]);

            DB::table('password_resets')->where(['phone'=> $request->phone])->delete();
            return redirect('/masuk')->with('sukses-daftar', 'Password anda sudah berhasil di update! Silahkan login ulang.'); 
        }
    }
}
