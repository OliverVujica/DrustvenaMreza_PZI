@extends('backbutton')
@extends('layout.layout')

@section('content')

@guest
    <div class="w-full text-center py-32" style="margin-top: 10%">
        <h1 class="h1 mt-5" style="margin-top: 2%; margin-bottom: 2%">
            Dobrodošli na <span style="color: #00437a">&lt;SUM&gt;</span> <span style="color: #ed1c24"> Mrežu</span>
        </h1>
        <p style="font-family: Arial, Helvetica, sans-serif">Najbolja mreža za studente</p>
        <a style="color:#00437a; background-color: white; border-color: #00437a" class="btn btn-primary mb-5" href="{{ route('login') }}" role="button">Prijavi se</a>

        <h1 style="margin-bottom: 8%"></h1>
    </div>
    
@endguest

<div class="row">
            
            <div class="col">
                @include('shared.success-msg')
                <!--include('shared.postavi_objavu')-->

                
                <h5 class="mt-3 mb-3">Posljednje objave</h4>

                @forelse ($objave as $objava)
                    <div class="mt-3">
                        @include('shared.kartica_objave')
                    </div>
                @empty
                    <p style="font-family: Arial, Helvetica, sans-serif" class="text-center my-3">Nema objava za pretragu</p>
                @endforelse

                <div class="mt-3" class="pagination">
                <!-- dodaj tipke za paginaciju -->
                {{ $objave->withQueryString()->links() }}
            </div>
            </div>
            <div class="col-md-4 col-sm-12">
                @include('shared.postavi_objavu')
                <div class="card mt-3">
                    <div class="card-header pb-0 border-0 mb-3">
                        <h5 class="">Popularne objave</h5>
                    </div>

                    <?php 
                        use App\Models\Objava;

                        $objaveCount = Objava::withCount('likes')->get();
                        $objaveCountSort = $objaveCount->sortByDesc('likes_count');
                    ?>

                    @foreach ($objaveCountSort->take(4) as $objava)
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="overflow-hidden">
                                    <img style="width:30px" class="me-2 avatar-sm rounded-circle"
                                        src={{ $objava->user->getImageURL() }} alt="{{ $objava->user->name }}">
                                    <a class="h6 mb-0 text-decoration-none" href="{{ route('users.show', $objava->user->id) }}">{{ $objava->user->name }}</a>
                                    <p style="font-family:Arial, Helvetica, sans-serif; font-size: 16px" class="text-muted">{{'@' . $objava->user->username }}</p>
                                </div>
                                <a class="btn btn-primary-soft rounded-circle icon-md ms-auto" href="{{ route('objava.show', $objava->id) }}"><i
                                    class="fa-solid fa-plus"> </i></a>
                            </div>
                            <div class="hstack gap-2 mb-1">
                                <div class="overflow-hidden">
                                    <p class="mb-0 small
                                    text-truncate" style="font-family: Arial, Helvetica, sans-serif">{{ $objava->objava }}</p>
                                </div>
                            </div>
                        </div>
                        <hr style="color: rgb(175, 172, 172)">
                    @endforeach
                </div>
            </div>
        </div>

        <div class="container">
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
          
              <p style="font-family: Arial, Helvetica, sans-serif" class="col-md-4 mb-0 text-body-secondary">© 2024 SUM Mreža</p>
          
              <div>
                <img onclick="topFunction()" class="img-fluid" src="https://i.postimg.cc/sDCVqjbT/sum-mreza-removebg-preview.png" width="70"
                            height="50" alt="SUM Drustvena Mreza"> 
              </div>
          
              <ul class="nav col-md-4 justify-content-end">
                <li class="nav-item"><a href="{{ route('dashboard') }}" class="nav-link px-2 text-body-secondary poc">Početna</a></li>
                <li class="nav-item"><a href="{{ route('feed') }}" class="nav-link px-2 text-body-secondary prat">Pratitelji</a></li>
                <li class="nav-item"><a href="/about" class="nav-link px-2 text-body-secondary pro">O projektu</a></li>
              </ul>
            </footer>
          </div>
@endsection