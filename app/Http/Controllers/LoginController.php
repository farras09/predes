<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\KepalaDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        if (!Session::get('login')) {
            return redirect('login')->with('alert', 'Anda Harus Login Terlebih Dahulu');
        } else {
            return redirect('/home');
        }
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        $this->validate(
            $request,
            [
                'no_hp' => 'required|numeric',
                'password' => 'required|string|min:6'
            ],
            [
                'no_hp.required' => 'Silahkan Isi Nomor Handphone',
                //'no_hp.numeric' => 'Nomor Handphone Harus Berupa Angka',
                'password.required' => 'Silahkan Isi Password',
                //'password.min' => 'Password Minimal 6 karakter'

            ]
        );
        $no_hp = $request->no_hp;
        $password = $request->password;

        // if (Auth::attempt(['no_hp_kades' => $no_hp, 'password' => $password])) {
        //     return redirect('/home');
        // } else {
        //     return redirect('login')->with(['alert' => 'No. Handphone atau Password Salah']);
        // }

        $data = KepalaDesa::where('no_hp_kades', $no_hp)->first();
        if ($data) {
            if (Hash::check($password, $data->password)) {
                Session::put('provinsi_id', $data->provinsi_id);
                Session::put('kabupaten_id', $data->kab_kota_id);
                Session::put('kecamatan_id', $data->kecamatan_id);
                Session::put('kelurahan_id', $data->kel_desa_id);
                Session::put('name', $data->nama_kades);
                Session::put('no_hp', $data->no_hp_kades);
                Session::put('login', TRUE);

                return redirect('/home');
            } else {
                return redirect('login')->with(['alert' => 'No. Handphone atau Password Salah']);
            }
        } else {
            return redirect('login')->with(['alert' => 'No. Handphone atau Password Salah']);
        }
    }

    public function logout()
    {
        // Auth::logout();
        // return redirect('login')->with(['alert-success' => 'Berhasil Logout']);
        Session::flush();
        return redirect('login')->with(['alert-success' => 'Berhasil Logout']);
    }
}
