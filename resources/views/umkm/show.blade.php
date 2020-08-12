@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">UMKM</a>
    </li>
    <li class="breadcrumb-item active">Detail</li>
  </ol>
  <!-- Icon Cards-->
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header text-white bg-primary">
          Pemiilik UMKM : {{ $umkm->nama_pemilik }}
        </div>
        <div class="card-body">
          <table class="table table-striped">
            <tr>
              <th>Nama UMKM</th>
              <td>{{ $umkm->nama_umkm }}</td>
            </tr>
            <tr>
              <th>Nomor Whatsapp</th>
              <td>{{ $umkm->nomor_wa }}</td>
            </tr>
            <tr>
              <th>Kode Akses</th>
              <td>{{ $umkm->kode_akses }}</td>
            </tr>
            <tr>
              <th>Alamat</th>
              <td>{{ $umkm->alamat }}</td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection