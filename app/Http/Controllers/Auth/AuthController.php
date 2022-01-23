<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\AcademyYear;
use App\Models\BiodataOne;
use App\Models\BiodataTwo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Carbon;
use App\Http\Requests\AuthRequest;
use App\Models\Setting;
use App\Models\Stage;
use App\Models\VerifyUser;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginProses(Request $request)
    {
        $data = $request->only('phone','password');

        if (Auth::attempt($data)) {
            $role_user=User::where('phone','=',$request->phone)->get();
            $role = $role_user->pluck('role')->first();

            $user_id = $role_user->pluck('id')->first();

            $user = User::findOrFail(Auth::user()->id);
            $user->update([
                'last_login' => Carbon::now()->toDateTimeString(),
            ]);

            if ($role == 'admin') {
                return redirect()->route('dashboard');
            }else{
                if (Auth::user()->confirm_token != Auth::user()->token) {
                    Auth::logout();
                    // return redirect()->route('login')->with('sukses-warning','Email anda belum terverifikasi, Silahkan Verifikasi email terlebih dahulu!');
                    return redirect()->route('get-token', $request->phone)->with('alert-login', 'Silahkan konfirmasi pendaftaran dengan memasukkan Kode OTP yang telah kami kirim di Whatsapp !');

                }
                $bio = BiodataTwo::where('user_id','=',$user_id)->get();
                $user_bio = $bio->toArray();
                // dd($user_bio);
                if ( count($user_bio) > 0) {
                    return redirect()->route('user-dashboard');
                }else{
                    return redirect()->route('user-dashboard')->with('gagal_tes','hello');
                }
            }
        }else{
            return redirect()->back()->with('failed-danger','Nomor Handphone atau Password salah.');
        }
    }

    public function register()
    {
        return view('auth.register');
    }
    
    public function registerProses(AuthRequest $request)
    {
        $no_wa= $request->get('no_wa');
        $no = str_split($no_wa, 3);

        $birthday = $request->year."-".$request->month."-".$request->day;

        $date = date('Y-m-d H:i:s', strtotime($birthday));

        $age = Carbon::parse($date)->age;

        if ($no[0] == "+62") {
            $no1= array(0 =>"0");
            $wa1= array_replace($no, $no1);
            $wa = implode("", $wa1);

        }else{
            $wa = $no_wa;
        }

        $name = explode(' ',trim($request->full_name));
        $token = mt_rand(1000,9999);
        
        $user = User::create([
            'name'=> $name[0],
            'phone'=>$wa,
            'password'=>bcrypt($request->password),
            'role'=>'pendaftar',
            'token'=> $token,
        ]);

        $academy_year = AcademyYear::where('is_active', true)->orderBy('id', 'desc')->pluck('id')->first();
        $stage = Stage::whereHas('academy_year', function($query){
            $query->where('is_active', true);
        })->orderBy('id', 'desc')->pluck('id')->first();

        BiodataOne::create([
            'user_id'=>$user->id,
            'academy_year_id'=>$academy_year,
            'full_name'=>$request->full_name,
            'family'=>$request->family,
            'age'=>$age,
            'birth_date'=>$date,
            'no_wa'=> $wa,
            'gender'=>$request->gender,
            'stage_id'=>$stage,
        ]);

        //NOTIF KE WA
        $link =  route('get-token', $wa);
        $data = [
            'sender' => Setting::pluck('no_msg'),
            'reciver' => $wa,
            'message' => 'Untuk *mengkonfirmasi pendaftaran* silahkan masukkan kode OTP : 

*'.$token.'* 

Atau masuk dilink berikut '.$link
        ];
        sendMessage($data);

        return redirect()->route('get-token', $wa);
    }

    public function resendToken($wa)
    {
        $link =  route('get-token', $wa);
        $token = mt_rand(1000,9999);

        User::wherePhone($wa)->update([
            'token' => $token
        ]);

        $data = [
            'sender' => Setting::pluck('no_msg'),
            'reciver' => $wa,
            'message' => 'Untuk mengkonfirmasi pendaftaran silahkan masukkan kode OTP : '.$token.' dilink berikut '.$link
        ];
        sendMessage($data);

        return back()->with('resend-msg', 'Token baru telah kami kirim ke no Whatsapp anda silahkan masukkan ulang Kode OTP');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function getToken($wa)
    {
        return view('auth.otp', compact('wa'));
    }

    public function postToken(Request $request, $wa)
    {
        $user = User::where('phone', $wa)->get()->first();
        $token = $request->t1.$request->t2.$request->t3.$request->t4;
        if ($token == $user->token) {

            User::where('phone', $wa)->update([
                'confirm_token' => $token
            ]);
            
            // NOTIF WA
            $data = [
                'sender' => Setting::pluck('no_msg'),
                'reciver' => $wa,
                'message' => 'Selamat anda berhasil *konfirmasi pendaftaran*,

Nama : *'.$user->BiodataOne->full_name.'*
Tanggal Lahir : *'.date('d-m-Y', strtotime($user->BiodataOne->birth_date)).'*
Keluarga : *'.$user->BiodataOne->family.'*
No Wa : *'.$user->phone.'*
Tanggal Registrasi : '.$user->created_at->format('d-m-Y H:i').' WIB

Silahkan *login*, 
untuk melakukan proses seleksi selanjutnya !, 
Di link berikut '.route('login')
            ];
            sendMessage($data);

            Auth::login($user);
            
            return redirect()->route('user-dashboard')->with('sukses-kirim', 'Selamat anda berhasil konfirmasi pendaftaran, silahkan lanjut tes selanjutnya !');
        }else{
            return back()->with('gagal-kirim','Token yang anda masukkan salah / tidak sesuai');
        }
    }

}
