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
use App\Models\Stage;
use App\Models\VerifyUser;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function login()
    {
        return redirect()->route('home');
    }

    public function loginProses(Request $request)
    {
        $data = $request->only('phone','password');

        if (Auth::attempt($data)) {
            $role_user=User::where('phone','=',$request->phone)->get();
            $role = $role_user->pluck('role')->first();

            $user_id = $role_user->pluck('id')->first();
            // $biodata_2 = BiodataTwo::where('id' ==)

            $user = User::findOrFail(Auth::user()->id);
            $user->update([
                'last_login' => Carbon::now()->toDateTimeString(),
            ]);

            if ($role == 'admin') {
                return redirect()->route('dashboard');            
            }else{
                // if (Auth::user()->email_verified_at == null) {
                //     Auth::logout();
                //     return redirect()->route('login')->with('sukses-warning','Email anda belum terverifikasi, Silahkan Verifikasi email terlebih dahulu!');
                // }
                $bio = BiodataTwo::where('user_id','=',$user_id)->get();
                $user_bio = $bio->toArray();
                //dd($user_bio);
                if ( count($user_bio) > 0) {
                    return redirect()->route('user-dashboard');
                }else{
                    return redirect()->route('user-dashboard')->with('gagal_tes','hello');
                }
            }
        }else{
            return redirect()->route('login');
        }
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerProses(AuthRequest $request)
    { 
        // dd($request->all());
        $user= User::create([
            'name'=>$request->name,
            'phone'=>$request->no_wa,
            'password'=>bcrypt($request->password),
            'role'=>'pendaftar',
        ]);

        $no_wa= $request->get('no_wa');
        $no = str_split($no_wa, 3);

        $date=$request->get('age');
        
        $age = Carbon::parse($date)->age;

        if ($no[0] == "+62") {
            $no1= array(0=>"08");
            $wa1= array_replace($no, $no1);
            $wa = implode("", $wa1);

        }else{
            $wa = $no_wa;
        }
        
        // $academy_year = AcademyYear::where('is_active','=','1')->orderBy('id','desc')->pluck('id');
        // $stage = AcademyYear::where('is_active','=','1')->orderBy('id','desc')->pluck('stage_id');

        $academy_year = AcademyYear::where('is_active', true)->orderBy('id', 'desc')->pluck('id')->first();
        $stage = Stage::whereHas('academy_year', function($query){
            $query->where('is_active', true);
        })->orderBy('id', 'desc')->pluck('id')->first();

        BiodataOne::create([
            'user_id'=>$user->id,
            'academy_year_id'=>$academy_year,
            'name'=>$request->name,
            'family'=>$request->family,
            'age'=>$age,
            'birth_date'=>$date,
            'no_wa'=>$wa,
            'gender'=>$request->gender,
            'stage_id'=>$stage,
        ]);

        // kirim wa verify
        // VerifyUser::create([
        //     'user_id' => $user->id,
        //     'token' => bin2hex(random_bytes(8))
        // ]);
        
        // kirim email untuk verifikasi
        // VerifyUser::create([
        //   'users_id' => $user->id,
        //   'token' => bin2hex(random_bytes(40))
        // ]);
        // Mail::to('bangfkr002@gmail.com')->send(new VerifikasiEmail($user));
        // return redirect()->back();

        // return redirect('/')->with('sukses-daftar','Selamat anda berhasil mendaftar, silahkan login untuk memulai pendaftaran !');
        return back()->with('success-create','Selamat anda berhasil mendaftar, silahkan lakukan konfirmasi pendaftaran yang telah kami kirim di whatsapp !');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    // public function getToken()
    // {
    //     return view('auth.inputToken');
    // }

    // public function postToken(Request $request, $id)
    // {
    //     $user = User::find($id);

    //     $user->where('id', $user->id)->update([
    //         'token' => $request->token
    //     ]);
    //     return redirect('login')->with('success-verify', 'Selamat anda berhasil konfirmasi pendaftaran, akun anda sekarang sudah bisa untuk proses seleksi selanjutnya !');
    // }
}
