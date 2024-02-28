@extends('layout.layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-sm-8 col-md-6 col-lg-5">
        <form class="form mt-5" action="{{ route('login') }}" method="post">
            @csrf
            <h3 class="text-center text-dark">Prijava</h3>

            <div class="form-group mt-3">
                <label for="Email" class="text-dark">E-mail adresa</label><br>
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

            <div class="form-group">
                <br>
                <input type="submit" name="submit" class="btn btn5-outline-custom-color btn-md" value="Prijavite se">
            </div>

            <div class="text-center mt-2">
                <a href="/register" class="regi">Novi ste na mreži? Registrirajte se ovdje</a>
            </div>
        </form>
    </div>
</div>


<style>
    .btn-md {
        width: 80%;   
        margin-left: 10%;
        height: 40px;
        margin-bottom: 20px;
    }
    .btn5-outline-custom-color:hover {
        border-color: #00437a;
        color: #00437a;
    }

    .btn5-outline-custom-color {
        background-color: #00437a;
        color: white;
    }
    
    .regi {
        color: #8d8d8d;
        text-decoration: none;
        font-weight: bold;
    }
    
    .regi:hover {
        color: #00437a;
        text-decoration: none;
    }
</style>
@endsection