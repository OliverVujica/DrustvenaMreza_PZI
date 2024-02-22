<nav class="navbar navbar-expand-lg bg-dark border-bottom border-bottom-dark ticky-top bg-body-tertiary"
        data-bs-theme="secondary"> <!-- data-bs-theme="dark" -->
        <div class="container">
            <a class="navbar-brand fw-light" href="/">
                
                    <img class="img-fluid" src="https://i.postimg.cc/sDCVqjbT/sum-mreza-removebg-preview.png" width="80"
                    height="60"
                    style="margin-right: 13px;">  
            
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <ul class="nav nav-underline">
                <li class="nav-item">
                    <a style="color: #00437a" class="{{ (Route::is('dashboard')) ? 'nav-link active' : '' }} nav-link" href="{{ route('dashboard') }}">Početna</a>
                </li>
                <li class="nav-item">
                    <a style="color: #00437a" class="{{ (Route::is('feed')) ? 'nav-link active' : '' }} nav-link" href="{{ route('feed') }}">Pratitelji</a>
                </li>
              </ul>

              <form class="d-flex" role="search">
                <form action="{{ route('dashboard') }}" method="GET">
                    <input style="margin-left: 20px; border-radius: 15px" value="{{ request('search', '') }}" name="search" placeholder="Pretraga" class="form-control w-75" type="text">
                    <button class="btn btn-white"> 
                        <i class="fas fa-search"></i>
                    </button>
                </form>
              </form>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="nav nav-underline">
                    @guest
                        <li class="nav-item">
                            <a style="color: #00437a" class="{{ (Route::is('login')) ? 'nav-link active' : '' }} nav-link" href="{{ route('login') }}">Prijava</a>
                        </li>
                        <li class="nav-item">
                            <a style="color: #00437a" class="{{ (Route::is('register')) ? 'nav-link active' : '' }} nav-link" href="{{ route('register') }}">Registracija</a>
                        </li>
                    @endguest
                    @auth()
                        @can('admin')
                            <li class="nav-item">
                                <a style="color: #00437a" class="{{ (Route::is('admin.dashboard')) ? 'text-white bg-dark rounded' : '' }} nav-link" href="/admin/users">Admin</a>
                            </li>
                        @endcan
                        <li class="nav-item">
                            <a style="color:#00437a" class="{{ (Route::is('profile')) ? 'nav-link active' : '' }} nav-link" href="{{ route('profile') }}">Moj Profil</a>
                            <?php #{{ Auth::user()->name }} ?>
                        </li>
                        <li class="nav-item" style="margin-top: 6px">
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <input type="submit" value="Odjava" class="btn btn-outline-custom-color btn-sm">
                            </form>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

<style>
    .text-custom-color {
        background-color: #00437a;
    }
    
    .btn-outline-custom-color {
        border-color: #ed1c24;
        color: #ed1c24;
    }

    .btn-outline-custom-color:hover {
        background-color: #ed1c24;
        color: white;
    }

::-webkit-input-placeholder {
   font-size: 15px!important;
}

:-moz-placeholder { 
      font-size: 15px!important;
}

</style>