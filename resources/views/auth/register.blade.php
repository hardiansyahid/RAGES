@extends('layout.auth.template')

@section('head')
    <title>Buat Akun - Radio Gema Education System</title>
@endsection

@section('content')
    <div class="d-flex vh-100 justify-content-center align-item-center container">
        <div class="align-self-center">
            <div class="text-center">
                <h1 class="text-primary font-1"><b>RAGES</b></h1>
                <p class="text-muted font-1">Buat Akun Baru</p>
            </div>

            <form id="form" action="{{url('/register')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="nama" name="nama" id="nama" class="form-control mt-3 inputText" placeholder="Nama Lengkap" value="{{ old('nama') }}">
                <input type="email" name="email" id="email" class="form-control mt-3 inputText" placeholder="Email" value="{{ old('email') }}">
                <input type="password" name="password" id="password" class="form-control mt-3 inputText" placeholder="Password">
                <div class="d-grid gap-2 my-3">
                    <button type="submit" class="btn btn-primary btn-lg fs-6" type="button"><small><b>BUAT AKUN</b></small></button>
                </div>
            </form>

            <div class="text-center">
                <p class="text-decoration-none text-muted font-1 font-xs mt-3">
                    Sudah punya akun ? <a href="{{url('/')}}" class="text-decoration-none text-primary"><b>MASUK</b></a>
                </p>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    $(document).ready(function(){
        $("#email").rules( "add", {
            required: true,
            maxlength:128,
            messages:{
                required : "Email harus diisi",
                maxlength: "Melebihi batas karakter yang diziinkan 128 karakter"
            }
        });
        $("#nama").rules( "add", {
            required: true,
            maxlength:200,
            messages:{
                required : "Nama harus diisi",
                maxlength: "Melebihi batas karakter yang diziinkan 200 karakter"
            }
        });

        $("#password").rules( "add", {
            required: true,
            minlength: 3,
            maxlength:300,
            messages: {
                required: "Password harus diisi",
                maxlength: "Melebihi batas karakter yang diziinkan 300 karakter",
                minlength: jQuery.validator.format("Password harus minimal 3 karakter")
            }
        });
    })
</script>
@endsection