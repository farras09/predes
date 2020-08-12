<div class="card-body">
    <!-- <div class="form-group">
        <label for="name">Nama UMKM</label>
        {!! Form::text('nama_umkm', null, ['class' => $errors->has('nama_umkm') ? 'form-control is-invalid' : 'form-control', 'required', 'autofocus']) !!}
        @if ($errors->has('nama_umkm'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('nama_umkm') }}</strong>
        </span>
        @endif
    </div>
    <div class="form-group">
        <label for="email">Nama Pemilik</label>
        {!! Form::text('nama_pemilik', null, ['class' => $errors->has('nama_pemilik') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
        @if ($errors->has('nama_pemilik'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('nama_pemilik') }}</strong>
        </span>
        @endif
    </div>
    <div class="form-group">
        <label for="email">Nomor Whatsapp</label>
        {!! Form::text('nomor_wa', null, ['class' => $errors->has('nomor_wa') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
        @if ($errors->has('nomor_wa'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('nomor_wa') }}</strong>
        </span>
        @endif
    </div>
    <div class="form-group">
        <label for="email">Alamat</label>
        {!! Form::textarea('alamat', null, ['class' => $errors->has('alamat') ? 'form-control is-invalid' : 'form-control', 'required']) !!}
        @if ($errors->has('alamat'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('alamat') }}</strong>
        </span>
        @endif
    </div> -->

</div>

<div class="card-footer bg-transparent">
    <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
    <!-- <button class="btn btn-primary" type="submit">
        Simpan
    </button> -->
</div>

@section('assets-bottom')
<!-- <script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#lfm').filemanager('image');
    });
</script> -->

<script>
    $(document).ready(function() {

        var count = 1;
        var limit = document.getElementsByClassName("page");
        dynamic_field(count);

        function dynamic_field(number) {

            html = '<div class="page">';
            html += '<div class="form-group"> <label for="name">Nama UMKM</label> {!! Form::text("nama_umkm[]", null, ["class" => $errors->has("nama_umkm") ? "form-control is-invalid" : "form-control", "required", "autofocus"]) !!} @if ($errors->has("nama_umkm")) <span class="invalid-feedback"><strong>{{ $errors->first("nama_umkm") }}</strong></span>@endif</div>';
            html += '<div class="form-group"> <label for="name">Nama Pemilik</label> {!! Form::text("nama_pemilik[]", null, ["class" => $errors->has("nama_pemilik") ? "form-control is-invalid" : "form-control", "required"]) !!} @if ($errors->has("nama_pemilik")) <span class="invalid-feedback"><strong>{{ $errors->first("nama_pemilik") }}</strong></span>@endif</div>';
            html += '<div class="form-group"><label for="email">Nomor Whatsapp</label>{!! Form::text("nomor_wa[]", null, ["class" => $errors->has("nomor_wa") ? "form-control is-invalid" : "form-control", "required"]) !!}@if ($errors->has("nomor_wa"))<span class="invalid-feedback"><strong>{{ $errors->first("nomor_wa") }}</strong></span>@endif</div>';
            html += '<div class="form-group"><label for="email"> Alamat </label>{!! Form::textarea("alamat[]", null, ["class" => $errors-> has("alamat") ? "form-control is-invalid" : "form-control", "required"]) !!}@if($errors->has("alamat")) <span class = "invalid-feedback" ><strong> {{$errors->first("alamat")}}</strong></span>@endif</div>';
            if (number > 1) {
                html += '<button type="button" name="remove" id="" class="btn btn-danger remove mb-2">Hapus Form</button></div>';
                $('.card-body').append(html);
            } else {
                html += '<button type="button" name="add" id="add" class="btn btn-success mb-2">Tambah Form</button></div>';
                $('.card-body').html(html);
            }

        }

        $(document).on('click', '#add', function() {
            count++;
            dynamic_field(count);
        });

        $(document).on('click', '.remove', function() {
            count--;
            $(this).closest("div", limit).remove();
        })



    })
</script>

@endsection