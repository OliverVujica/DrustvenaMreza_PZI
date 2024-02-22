<div style="margin-right: 2%">
    @auth()
    @if (Auth::user()->likesPost($objava))    
        <form action="{{ route('objave.dislike', $objava->id) }}" method="POST">
            @csrf
            <button type="submit" class="fw-light nav-link fs-6"> <span style="color: red" class="fas fa-heart me-1">
                </span> {{ $objava->likes()->count() }} </button>
        </form>
    @else
        <form action="{{ route('objave.like', $objava->id) }}" method="POST">
            @csrf
            <button type="submit" class="fw-light nav-link fs-6"> <span class="far fa-heart me-1 btn2">
                </span> {{ $objava->likes()->count() }} </button>
        </form>
    @endif
    @endauth
    @guest
        <a href="{{ route('login') }}" class="fw-light nav-link fs-6"> <span class="far fa-heart me-1 btn2">
            </span> {{ $objava->likes()->count() }} </a>
    @endguest
</div>

<style>
    .btn2:hover {
        color: red;
    }
</style>