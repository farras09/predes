<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function credentials(Request $request)
    {

        $this->validate(
            $request,
            [
                'email' => 'required|numeric',
                'password' => 'required|string|min:6'
            ],
            [
                'email.required' => 'Silahkan Isi Nomor Handphone',
                'email.numeric' => 'Nomor Handphone Harus Berupa Angka',
                'password.required' => 'Silahkan Isi Password',
                'password.min' => 'Password Minimal 6 karakter'

            ]
        );

        if (is_numeric($request->get('email'))) {
            return ['no_hp_kades' => $request->get('email'), 'password' => $request->get('password')];
        }
        return ['no_hp_kades' => $request->get('email'), 'password' => $request->get('password')];

        // $no_hp = $request->no_hp;
        // $password = $request->password;

        // if (Auth::attempt(['no_hp_kades' => $no_hp, 'password' => $password])) {
        //     return redirect('/home');
        // } else {
        //     return redirect('login')->with(['alert' => 'No. Handphone atau Password Salah']);
        // }

        // $data = KepalaDesa::where('no_hp_kades', $no_hp)->first();
        // if ($data) {
        //     if (Hash::check($password, $data->password)) {
        //         Session::put('provinsi_id', $data->provinsi_id);
        //         Session::put('kabupaten_id', $data->kab_kota_id);
        //         Session::put('kecamatan_id', $data->kecamatan_id);
        //         Session::put('kelurahan_id', $data->kel_desa_id);
        //         Session::put('name', $data->nama_kades);
        //         Session::put('no_hp', $data->no_hp_kades);
        //         Session::put('login', TRUE);

        //         return redirect('/home');
        //     } else {
        //         return redirect('login')->with(['alert' => 'No. Handphone atau Password Salah']);
        //     }
        // } else {
        //     return redirect('login')->with(['alert' => 'No. Handphone atau Password Salah']);
        // }
    }
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('/login');
    }
}
