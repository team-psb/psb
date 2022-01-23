<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\VerifikasiEmail;
use App\Models\User;
use App\Models\VerifyUser;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\Setting;

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
        
        $token = bin2hex(random_bytes(6));
        $user = [
            'phone' => $request->phone,
            'token' => $token,
        ];

        // dd($user['token']);
        DB::table('password_resets')->insert($user);

        $link =  route('getPassword', $token);
        // dd($link);

        $data = [
            'sender' => Setting::pluck('no_msg'),
            'reciver' => $request->phone,
            'message' => 'Untuk mereset *Password Baru* akun anda silahkan masuk ke link berikut : '.$link
        ];
        sendMessage($data);

        // Mail::to($user['email'])->send(new VerifikasiEmail($user));

        return back()->with('sukses-buat', 'Link reset Password sudah kami kirim ke nomer Whatsapp anda! Dengan Nomor : '. $request->phone);
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

            $data = [
                'sender' => Setting::pluck('no_msg'),
                'reciver' => $request->phone,
                'message' => 'Selamat anda berhasil mereset *Password*.
*Gunakan Nomor dan Password Untuk Login*

Nomor Hp: *'.$request->phone.'* 
Password Baru *'. $request->password.'*

Silahkan untuk login di : '.route('login')
            ];
            sendMessage($data);

            return redirect()->route('login')->with('sukses-daftar', 'Password anda sudah berhasil di Update! Silahkan Untuk Login.'); 
        }
    }
}
