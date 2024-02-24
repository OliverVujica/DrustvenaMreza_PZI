<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                    src={{ $user->getImageURL() }}>
                <div>
                    <h3 style="color: #00437a" class="card-title mb-0"> {{ $user->name }} </h3>
                    <span class="fs-6 text-muted">{{'@' . $user->username }}</span>
                    @auth()
                        @if (Auth::id() == $user->id)
                            <br>
                            <br>
                            <a style="color: #00437a; text-decoration: none" href="{{ route('users.edit', $user->id) }}"><i style="color: #00437a" class="fa-solid fa-pen-to-square"></i> Postavke profila </a>
                        @endif
                    @endauth
                </div>
            </div>
            <div>
            </div>

        </div>
        @if($editing ?? false)
            <div class="mt-3">
                <label for="" >Slika profila</label>
                <input type="file" name="image" class="form-control" id="">

                <button class="btn btn-dark btn-sm mb-3">Save</button>

            </div>
        @endif
        <div class="px-2 mt-4">
            <h5 style="color: #00437a" class="fs-5"> O meni : </h5>            
            <h5 class="fs-6 fw-light mb-4">
                {{ $user->bio }}
            </h5>

            <div class="d-flex justify-content-start mb-2">
                <a href="#" data-bs-toggle="modal" data-bs-target="#followersModal" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user-friends me-1">
                    </span> {{ $user->followers()->count() }} </a>
                <a href="#" data-bs-toggle="modal" data-bs-target="#followingsModal" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                    </span> {{ $user->followings()->count() }} </a>
                <a href="#" onclick="scrollByPixels(300)" class="fw-light nav-link fs-6 me-3"> <span class="fa-solid fa-images me-1">
                    </span> {{ $user->objave()->count() }} </a>
                <a style="padding-right: 15px" href="#" class="fw-light nav-link fs-6"> <span class="fa-solid fa-message me-1">
                    </span> {{ $user->komentari()->count() }} </a>
                @if(Auth::check() && Auth::user()->id === $user->id)
                <a href="#" data-bs-toggle="modal" data-bs-target="#likedPostsModal" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-heart">
                    </span> {{ $user->likes()->count() }}  </a>
                @endif
            </div>

            <div class="modal fade" id="followersModal" tabindex="-1" aria-labelledby="followersModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 style="color: #00437a" class="modal-title" id="followersModalLabel">Pratitelji</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @foreach ($user->followers as $follower)
                                <div class="d-flex align-items-center mb-2">
                                    <img style="width:40px" class="avatar-sm rounded-circle me-2" src={{ $follower->getImageURL() }}>
                                    <a style="color: #00437a; text-decoration: none" href="{{ route('users.show', $follower->id) }}">{{ $follower->name }}</a>
                                </div>
                                <hr>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="followingsModal" tabindex="-1" aria-labelledby="followingsModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="color: #00437a" class="modal-title" id="followersModalLabel">Pratim</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @foreach ($user->followings as $follow)
                            <div class="d-flex align-items-center mb-2">
                                <img style="width:40px" class="avatar-sm rounded-circle me-2" src={{ $follow->getImageURL() }}>
                                <a style="color: #00437a; text-decoration: none" href="{{ route('users.show', $follow->id) }}">{{ $follow->name }}</a>
                            </div>
                            <hr>
                        @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="likedPostsModal" tabindex="-1" aria-labelledby="likedPostsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="color: #00437a" class="modal-title" id="likedPostsModalLabel">Objave označene sa "sviđa mi se" <i class="fas fa-heart"></i></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @foreach ($user->likes as $likedPost)
                        <div class="d-flex align-items-center mb-2">
                            <img style="width:40px" class="avatar-sm rounded-circle me-2" src="{{ $likedPost->user->getImageURL() }}">
                            <a style="color: #00437a; text-decoration: none" href="{{ route('objava.show', $likedPost->id) }}">{{ strlen($likedPost->objava) > 50 ? substr($likedPost->objava, 0, 50) . '...' : $likedPost->objava }}</a>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>    
        
            @auth()

                @if(Auth::id() != $user->id) 
                <div class="mt-3">
                    @if(Auth::user()->follows($user))
                        <form method="POST" action="{{ route('users.unfollow', $user->id) }}">
                            @csrf
                            <button style="padding-bottom: 5px; margin-bottom: 5px" type="submit" class="btn btnotp-outline-custom-color btn-sm"> Otprati </button>
                        </form>
                    @else
                        <form method="POST" action="{{ route('users.follow', $user->id) }}">
                            @csrf
                            <button style="padding-bottom: 5px; margin-bottom: 5px" type="submit" class="btn btnzap-outline-custom-color btn-sm"> Zaprati </button>
                        </form>
                    @endif
                </div>
                @endif
            @endauth
        </div>
    </div>
</div>

<script>
    function scrollByPixels(pixels) {
        window.scrollBy(0, pixels);
    }
</script>

<style>
    .fa-user-friends:hover, .fa-user:hover, .fa-images:hover, .fa-message:hover{
        color: #00437a;
    }

    .fa-heart:hover{
        color: #ed1c24;
    }

    .btnotp-outline-custom-color{
        color: #ed1c24;
        border-color: #ed1c24;
    }
    .btnotp-outline-custom-color:hover{
        background-color: #ed1c24;
        color: white;
    }

    .btnzap-outline-custom-color{
        color: #00437a;
        border-color: #00437a;
    }
    .btnzap-outline-custom-color:hover{
        background-color: #00437a;
        color: white;
    }
</style>