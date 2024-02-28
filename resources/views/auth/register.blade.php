@extends('layout.layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-sm-8 col-md-6 col-lg-5">
        <form class="form mt-5" action="{{ route('register') }}" method="post">
            @csrf
            <h3 class="text-center text-dark">Registracija</h3>
            <div class="form-group">
                <label for="name" class="text-dark">Ime</label><br>
                <input placeholder="Ime" type="text" name="name" id="name" class="form-control">
                @error('name')
                    <span class='d-block fs-6 text-danger mt-2'> {{ $message }} </span>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="username" class="text-dark">Korisničko ime</label><br>
                <input placeholder="Korisničko ime" type="text" name="username" id="username" class="form-control">
                @error('username')
                    <span class='d-block fs-6 text-danger mt-2'> {{ $message }} </span>
                @enderror
            <div class="form-group mt-3">
                <label for="email" class="text-dark">E-mail adresa</label><br>
                <input placeholder="E-mail" type="email" name="email" id="email" class="form-control">
                @error('email')
                    <span class='d-block fs-6 text-danger mt-2'> {{ $message }} </span>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="password" class="text-dark">Lozinka</label><br>
                <input placeholder="Lozinka" type="password" name="password" id="password" class="form-control">
                @error('password')
                    <span class='d-block fs-6 text-danger mt-2'> {{ $message }} </span>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="confirm-password" class="text-dark">Potvrda lozinke</label><br>
                <input placeholder="Potvrda" type="password" name="password_confirmation" id="confirm-password" class="form-control">
                @error('password_confirmation')
                    <span class='d-block fs-6 text-danger mt-2'> {{ $message }} </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="remember-me" class="text-dark"></label><br>
                <input type="submit" name="submit" class="btn btn6-outline-custom-color btn-md" value="Registrirajte se">
            </div>
            <div class="text-center mt-2" style="padding-top: 20px">
                <a href="/login" class="logi">Već imate korisnički račun? Prijavite se ovdje</a>
            </div>
            <div style="margin-bottom: 80px">
            </div>
        </form>
    </div>
</div>

<style>
    .btn-md {
        width: 80%;   
        margin-left: 10%;
        height: 40px;
    }

    .btn6-outline-custom-color:hover {
        border-color: #00437a;
        color: #00437a;
    }

    .btn6-outline-custom-color {
        background-color: #00437a;
        color: white;
    }

    .logi {
        color: #8d8d8d;
        text-decoration: none;
        font-weight: bold;
    }
    
    .logi:hover {
        color: #00437a;
        text-decoration: none;
    }
</style>
@endsection