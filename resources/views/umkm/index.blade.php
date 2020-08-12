@extends('layouts.admin.app')

@section('assets-top')
<!-- Page level plugin CSS-->
<link href="{{ asset('assets/blog-admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<!-- Responsive datatable examples -->
<link href="{{ asset('assets/blog-admin/vendor/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="container-fluid">
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Daftar UMKM</a>
    </li>
    <li class="breadcrumb-item active">Table</li>
  </ol>
  <!-- Example DataTables Card-->
  <div class="card mb-3">
    <div class="card-header">
      <i class="fa fa-list"></i> UMKM
      <a href="{{ route('umkm.create') }}" class="btn btn-sm btn-primary">Tambah Baru</a>
    </div>
    <div class="card-body table-responsive">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Nama UMKM</th>
              <th>Pemilik UMKM</th>
              <th>Kode Akses</th>
              <th>Nomor Whatsapp</th>
              <th>Alamat</th>
              <th>Nama Kepala Desa</th>
              <th></th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Nama UMKM</th>
              <th>Pemilik UMKM</th>
              <th>Kode Akses</th>
              <th>Nomor Whatsapp</th>
              <th>Alamat</th>
              <th>Nama Kepala Desa</th>
              <th></th>
            </tr>
          </tfoot>
          <tbody>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection

@section('assets-bottom')
<!-- Page level plugin JavaScript-->
<script src="{{ asset('assets/blog-admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/blog-admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<!-- Responsive examples -->
<script src="{{ asset('assets/blog-admin/vendor/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/blog-admin/vendor/datatables/responsive.bootstrap4.min.js') }}"></script>
<script>
  $(document).ready(function() {
    $("#dataTable").DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ route('api.datatable.umkm') }}",
      columns: [{
          data: 'umkm',
          name: 'umkm'
        },
        {
          data: 'pemilik',
          name: 'pemilik'
        },
        {
          data: 'kode_akses',
          name: 'kode_akses'
        },
        {
          data: 'nomor_wa',
          name: 'nomor_wa'
        },
        {
          data: 'alamat',
          name: 'alamat'
        },
        {
          data: 'kepala_desa',
          name: 'kepala_desa'
        },
        {
          data: 'action',
          name: 'action',
          orderable: false,
          searchable: false
        }
      ]
    })
  });
</script>
@endsection