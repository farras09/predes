@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">UMKM</a>
    </li>
    <li class="breadcrumb-item active">Edit</li>
  </ol>
  <!-- Icon Cards-->
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header text-white bg-primary">
          Edit UMKM
        </div>
        {!! Form::model($umkm, ['route' => ['umkm.update', $umkm->id], 'method' => 'PUT']) !!}
        @include('umkm._form-edit')
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endsection