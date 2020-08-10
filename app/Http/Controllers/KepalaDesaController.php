<?php

namespace App\Http\Controllers;

use App\Models\KepalaDesa;
use App\Models\District;
use App\Models\Regency;
use App\Models\Village;
use Illuminate\Http\Request;

class KepalaDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $this->validate(
            $request,
            [
                'provinsi' => 'required',
                'kabupaten_kota' => 'required',
                'kecamatan' => 'required',
                'kelurahan_desa' => 'required',
                'nama_kepala_desa' => 'required|string|max:255',
                'kontak_desa' => 'required|numeric',
                'password' => 'required|string|min:6'
            ],
            [
                'provinsi.required' => 'Silahkan Pilih Provinsi',
                'kabupaten_kota.required' => 'Silahkan Pilih Kabupaten/Kota',
                'kecamatan.required' => 'Silahkan Pilih Kecamatan',
                'kelurahan_desa.required' => 'Silahkan Pilih Kelurahan/Desa',
                'nama_kepala_desa.required' => 'Silahkan Isi Nama Anda',
                'kontak_desa.required' => 'Silahkan Isi Nomor Kontak Desa',
                'kontak_desa.numeric' => 'Nomor Harus Berupa Angka',
                'password.required' => 'Silahkan Isi Password',
                'password.min' => 'Password Minimal 6 karakter'

            ]
        );
        $save = KepalaDesa::create(
            [
                'provinsi_id' => $request->provinsi,
                'kab_kota_id' => $request->kabupaten_kota,
                'kecamatan_id' => $request->kecamatan,
                'kel_desa_id' => $request->kelurahan_desa,
                'nama_kades' => $request->nama_kepala_desa,
                'no_hp_kades' => $request->kontak_desa,
                'password' => bcrypt($request->password)
            ]

        );
        if ($save) {
            return redirect('/')->with(['success' => 'Berhasil Mengajukan']);
        } else {
            return redirect('/')->with(['error' => 'Gagal Mengajukan']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getregency(Request $request)
    {
        # code...
        $value = $request->get('value');
        $regency = Regency::where('province_id', $value)->get();
        $output = '<option value="">Pilih Kabupaten/Kota</option>';

        foreach ($regency as $row) {
            $output .= '<option value="' . $row->id . '">' . $row->name . '</option>';
        }
        echo $output;
    }
    public function getdistrict(Request $request)
    {
        $value = $request->get('value');
        $district = District::where('regency_id', $value)->get();
        $output = '<option value="">Pilih Kecamatan</option>';

        foreach ($district as $row) {
            $output .= '<option value="' . $row->id . '">' . $row->name . '</option>';
        }
        echo $output;
    }
    public function getvillage(Request $request)
    {
        $value = $request->get('value');
        $village = Village::where('district_id', $value)->get();
        $output = '<option value="">Pilih Kelurahan/Desa</option>';

        foreach ($village as $row) {
            $output .= '<option value="' . $row->id . '">' . $row->name . '</option>';
        }
        echo $output;
    }
}
