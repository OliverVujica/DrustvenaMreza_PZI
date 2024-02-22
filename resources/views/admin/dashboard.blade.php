@extends('layout.layout')

@section('content')
<div class="container">
    <div class="row justify-content-md-center">
            <div class="card" style="width: 100rem;">
              <div style="font-size: 50px; padding-left: 20px; padding-top: 10px">
                <i class="fas fa-user-secret"></i>
              </div>
                <div class="card-body">
                  <h4 class="card-title">Dobrodošli Admin</h4>
                  <p style="font-family: Arial, Helvetica, sans-serif" class="card-text">Za pristup admin panelu, pritisnite gumb.</p>
                  <a style="font-family:Arial, Helvetica, sans-serif; background-color: #00437a; border-color: #00437a" href="/admin/users" class="btn btn-primary">Admin Panel</a>
                </div>
              </div>
    </div>
</div>
@endsection