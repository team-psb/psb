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
        $data = $request->only('phone', 'password');

        if (Auth::attempt($data)) {
            $role_user = User::where('phone', '=', $request->phone)->get();
            $role = $role_user->pluck('role')->first();

            $user_id = $role_user->pluck('id')->first();

            $user = User::findOrFail(Auth::user()->id);
            $user->update([
                'last_login' => Carbon::now()->toDateTimeString(),
            ]);

            if ($role == 'admin') {
                return redirect()->route('dashboard');
            } else {
                if (Auth::user()->confirm_token != Auth::user()->token) {
                    Auth::logout();
                    // return redirect()->route('login')->with('sukses-warning','Email anda belum terverifikasi, Silahkan Verifikasi email terlebih dahulu!');
                    return redirect()->route('get-token', $request->phone)->with('alert-login', 'Silahkan konfirmasi pendaftaran dengan memasukkan Kode OTP yang telah kami kirim di Whatsapp !');
                }

                $tahun_ajaran = AcademyYear::where('is_active', true)->orderBy('id','desc')->first()->id;
                $bio1 = BiodataOne::where('academy_year_id', $tahun_ajaran)->where('user_id', '=', $user_id)->get();

                if (count($bio1) === 0) {
                    Auth::logout();
                    return redirect()->back()->with('failed-danger', 'Anda belum mendaftar, silahkan mendaftar dahulu.');
                }

                $bio = BiodataTwo::where('academy_year_id', $tahun_ajaran)->where('user_id', '=', $user_id)->get();
                $user_bio = $bio->toArray();

                // dd($bio, $role_user);
                // dd($user_bio);
                if (count($user_bio) > 0) {
                    return redirect()->route('user-dashboard');
                } else {
                    return redirect()->route('user-dashboard')->with('gagal_tes', 'hello');
                }
            }
        } else {
            return redirect()->back()->with('failed-danger', 'Nomor Handphone atau Password salah.');
        }
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerProses(AuthRequest $request)
    {
        $no_wa = $request->get('no_wa');
        $no = str_split($no_wa, 3);

        $birthday = $request->year . "-" . $request->month . "-" . $request->day;

        $date = date('Y-m-d H:i:s', strtotime($birthday));

        $age = Carbon::parse($date)->age;

        if ($no[0] == "+62") {
            $no1 = array(0 => "0");
            $wa1 = array_replace($no, $no1);
            $wa = implode("", $wa1);
        } else {
            $wa = $no_wa;
        }

        $academy_year = AcademyYear::where('is_active', true)->orderBy('id', 'desc')->pluck('id')->first();
        $stage = Stage::whereHas('academy_year', function ($query) {
            $query->where('is_active', true);
        })->orderBy('id', 'desc')->pluck('id')->first();



        $user = User::where('phone', $wa)->first();
        $name = explode(' ', trim($request->full_name));
        $token = mt_rand(1000, 9999);

        if (!$user) {
            $user = User::create([
                'name' => $name[0],
                'phone' => $wa,
                'password' => bcrypt($request->password),
                'role' => 'pendaftar',
                'token' => $token,
            ]);
        } else {
            $data = BiodataOne::where('user_id', $user->id)->where('academy_year_id', $academy_year)->first();
            if ($data) {
                $request->validate([
                    'no_wa' => 'unique:users,phone'
                ], [
                    'no_wa.unique' => 'Anda sudah teregistrasi, silahkan login.',
                ]);

                return redirect()->back()->with('no_wa', 'akun ini sudah terdaftar, silahkan login kembali');
            } else {
                $user->update([
                    'name' => $name[0],
                    'password' => bcrypt($request->password),
                    'token' => $token,
                ]);
            }
        }

        BiodataOne::create([
            'user_id' => $user->id,
            'academy_year_id' => $academy_year,
            'full_name' => $request->full_name,
            'family' => $request->family,
            'age' => $age,
            'birth_date' => $date,
            'no_wa' => $wa,
            'gender' => $request->gender,
            'stage_id' => $stage,
        ]);

        //NOTIF KE WA
        $link =  route('get-token', $wa);
        $data = [

            'target' => $wa,
            'message' => 'Assalamualaikum, Untuk *mengkonfirmasi pendaftaran* silahkan masukkan kode OTP :

*' . $token . '*

Atau masuk dilink berikut ' . $link
        ];
        sendMessage($data);

        return redirect()->route('get-token', $wa);
    }

    public function resendToken($wa)
    {
        $link =  route('get-token', $wa);
        $token = mt_rand(1000, 9999);

        User::wherePhone($wa)->update([
            'token' => $token
        ]);

        $data = [

            'target' => $wa,
            'message' => 'Assalamualaikum, Untuk *mengkonfirmasi pendaftaran* silahkan masukkan kode OTP :

*' . $token . '*

Atau masuk dilink berikut ' . $link
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
        $token = $request->t1 . $request->t2 . $request->t3 . $request->t4;
        if ($token == $user->token) {

            $tahun_ajaran = AcademyYear::where('is_active', true)->orderBy('id','desc')->first()->id;
            User::where('phone', $wa)->update([
                'confirm_token' => $token
            ]);

            // NOTIF WA
            $data = [

                'target' => $wa,
                'message' => 'Assalamualaikum, Selamat anda berhasil *konfirmasi pendaftaran*,

Nama : *' . $user->BiodataOne->where('academy_year_id', $tahun_ajaran)->first()->full_name . '*
Tanggal Lahir : *' . date('d-m-Y', strtotime($user->BiodataOne->where('academy_year_id', $tahun_ajaran)->first()->birth_date)) . '*
Keluarga : *' . $user->BiodataOne->where('academy_year_id', $tahun_ajaran)->first()->family . '*
No Wa : *' . $user->phone . '*
Tanggal Registrasi : ' . $user->created_at->format('d-m-Y H:i') . ' WIB

Silahkan *Lakukan Tes Selanjutnya*,
Atau di link : ' . route('user-dashboard') . '

🚀 *Cara Akses Dashboard User* :
- Buka Website PSB: https://daftar.mahirteknologi.com/
- Klik menu "Home", lalu login menggunakan No HP dan Password Anda.
- Setelah berhasil login, Anda akan diarahkan ke Dashboard User.


Berikut video Pengenalan dan Tes Tahap Pertama :
*Pengenalan Member Area Calon Santri Baru*
https://www.youtube.com/watch?v=N286_Z1gWRY

*Cara Mengikuti Tes Tahap Pertama*
https://www.youtube.com/watch?v=egq1vcAbwdo

informasi lebih lanjut PSB Pondok Mahir Teknologi :
https://daftar.mahirteknologi.com/user/informasi
'
            ];
            sendMessage($data);

            // auto login
            Auth::login($user);

            return redirect()->route('user-dashboard')->with('sukses-kirim', 'Selamat Anda berhasil konfirmasi pendaftaran, silahkan ikuti tes selanjutnya !');
        } else {
            return back()->with('gagal-kirim', 'Token yang anda masukkan salah / tidak sesuai');
        }
    }
}