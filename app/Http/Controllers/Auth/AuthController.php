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
        $data=$request->only('phone','password');

        if (Auth::attempt($data)) {
            $role_user=User::where('phone','=',$request->phone)->get();
            $role=$role_user->pluck('role')->first();

            $user_id = $role_user->pluck('id')->first();
            // $biodata_2 = BiodataTwo::where('id' ==)

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
                    return redirect()->route('dash-user');
                }else{
                    // return redirect()->back();
                    // return redirect()->route('dash-user')->with('gagal_tes','hello');
                    return back()->with([
                        'error' => 'gagal'
                    ]);
                }
            }
        }else{
            return redirect()->route('login')->with('sukses-danger','email atau password salah.');
        }
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerProses(Request $request)
    { 
        // dd($request->all());
        $user= User::create([
            'name'=>$request->name,
            'phone'=>$request->no_wa,
            'password'=>bcrypt($request->password),
            'role'=>'pendaftar'
        ]);

        $no_wa= $request->get('no_wa');
        $no = str_split($no_wa,3);

        $date=$request->get('age');
        
        $age = Carbon::parse($date)->age;

        if ($no[0] == "+62") {
            $no1= array(0=>"08");
            $wa1=array_replace($no,$no1);
            $wa=implode("",$wa1);

        }else{
            $wa=$no_wa;
        }
        
        $academy_year = AcademyYear::where('is_active','=','1')->orderBy('id','desc')->pluck('id');
        $stage = AcademyYear::where('is_active','=','1')->orderBy('id','desc')->pluck('stage_id');
        
        BiodataOne::create([
            'user_id'=>$user->id,
            'academy_year_id'=>$academy_year->first(),
            'full_name'=>$request->name,
            'family'=>$request->family,
            'age'=>$age,
            'birth_date'=>$date,
            'no_wa'=>$wa,
            'gender'=>$request->gender,
            'stage_id'=>$stage->first(),
        ]);
        
        // kirim email untuk verifikasi
        // VerifyUser::create([
        //   'users_id' => $user->id,
        //   'token' => bin2hex(random_bytes(40))
        // ]);
        // Mail::to('bangfkr002@gmail.com')->send(new VerifikasiEmail($user));
        // return redirect()->back();

        return redirect('/login')->with('sukses-daftar','Selamat anda berhasil mendaftar, silahkan login untuk memulai pendaftaran !');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}