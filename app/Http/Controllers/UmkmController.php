<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class UmkmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {

        $this->middleware('auth');
    }

    public function index()
    {

        return view('umkm.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('umkm.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 
        $rules = array(
            'nama_umkm.*' => 'required',
            'nama_pemilik.*' => 'required',
            'nomor_wa.*' => 'required|numeric|digits_between:1,13',
            'alamat.*' => 'required'
        );
        $error = Validator::make($request->all(), $rules);
        if ($error->fails()) {
            return response()->json([
                'error' => $error->errors()->all()
            ]);
        }

        //$umkm = new Umkm;
        // $kepala_desa_id = $request->kepala_desa_id;
        $nama_umkm = $request->nama_umkm;
        $nama_pemilik = $request->nama_pemilik;
        $nomor_wa = $request->nomor_wa;
        $alamat = $request->alamat;

        for ($count = 0; $count < count($nama_umkm); $count++) {
            $data = array(
                'kepala_desa_id' => Auth::user()->id,
                'nama_umkm' => $nama_umkm[$count],
                'nama_pemilik' => $nama_pemilik[$count],
                'kode_akses' => Str::random(5),
                'nomor_wa' => $nomor_wa[$count],
                'alamat' => $alamat[$count]
            );

            $insert_data[] = $data;
        }

        Umkm::insert($insert_data);

        return redirect()->to('/umkm');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $umkm = Umkm::findOrFail($id);
        return view('umkm.show', compact('umkm'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $umkm = Umkm::findOrFail($id);
        return view('umkm.edit', compact('umkm'));
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
        $this->validate($request, [
            'nama_umkm' => 'required',
            'nama_pemilik' => 'required',
            'nomor_wa' => 'required|numeric|digits_between:1,13',
            'alamat' => 'required'
        ]);

        $umkm = Umkm::findOrFail($id);
        $umkm->update($request->all());

        return redirect()->route('umkm');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Umkm::destroy($id)) return redirect()->back();
        return redirect()->route('umkm');
    }

    public function dataTable()
    {

        // $umkm = Umkm::query();
        $id = Auth::user()->id;
        $umkm = Umkm::select(
            'umkm.id as id',
            'umkm.nama_umkm as umkm',
            'umkm.nama_pemilik as pemilik',
            'umkm.kode_akses',
            'umkm.nomor_wa',
            'umkm.alamat',
            'kepala_desa.nama_kades as kepala_desa'
        )
            ->join('kepala_desa', 'kepala_desa.id', '=', 'umkm.kepala_desa_id')
            ->where('kepala_desa_id', $id)
            ->get();

        return DataTables::of($umkm)
            ->addColumn('action', function ($umkm) {
                return view('layouts.umkm.partials._action', [
                    'model' => $umkm,
                    'show_url' => route('umkm.show', $umkm->id),
                    'edit_url' => route('umkm.edit', $umkm->id),
                    'delete_url' => route('umkm.destroy', $umkm->id),
                ]);
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
