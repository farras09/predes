@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">UMKM</a>
    </li>
    <li class="breadcrumb-item active">Tambah UMKM baru</li>
  </ol>
  <!-- Icon Cards-->
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header text-white bg-primary">
          Tambah UMKM baru
        </div>
        {!! Form::open(['route' => 'umkm.store', 'method' => 'POST']) !!}
        @include('umkm._form')
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endsection