<div class="card" style="padding: 4px">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                    src={{ $objava->user->getImageURL() }} alt="{{ $objava->user->name }}">
                <div style="padding-left: 5px">
                    <h5 class="card-title mb-0"><a class="text-decoration-none link-dark" href="{{ route('users.show', $objava->user->id) }}"> {{ $objava->user->name }} 
                        </a></h5>
                        <span class="fs-6 text-muted">{{'@' . $objava->user->username }}</span>
                </div>
                <div style="margin-left: 10px">
                    <h5>.</h5>
                </div>
                <div style="margin-left: 12px">
                    <span style="font-size: 14px" class="fs-8 fw-light ">
                        {{ $objava->created_at->format('d F, Y') }}. <br> {{ $objava->created_at->diffForHumans() }} </span>
                </div>
            </div>
            <div>
                <form method="POST" action="{{ route('objava.destroy', $objava->id) }}">
                    <!-- danger je za crvene tipke -->
                    @csrf
                    @method('delete')
                    @auth()
                    @can('objava.edit', $objava)
                    <a class="mx-2 text-decoration-none link-dark" href="{{ route('objava.edit', $objava->id) }}">
                        <i style="font-size: 20px;" class="fa-regular fa-pen-to-square"></i></a>
                    @endcan
                    @endauth
                    <a class="text-decoration-none link-dark" href="{{ route('objava.show', $objava->id) }}"><i style="font-size: 20px" class="fa-regular fa-eye"></i></a>
                    @auth()
                    @can('objava.delete', $objava)
                    <button style="border-color: white" class="btn btn-white" onclick="deleteIdea(event)">
                        <i style="font-size: 20px; margin-left: -8px; margin-right: -8px" class="fa-regular
                        fa-trash-can"></i>          
                    </button>
                    @endcan
                    @endauth
                </form>
            </div>
        </div>
    </div>

    <div class="card-body">
        @if($editing ?? false)
        <form action="{{ route('objava.update', $objava->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <textarea name='objava' class="form-control" id="idea" rows="3">{{ $objava->objava }}</textarea>
                <!-- Ako imamo gresku u objavi, postavljena u kontroleru za objavu, koristi blade funkciju error -->
                @error('objava')
                    <span class='d-block -6 text-danger mt-2'> {{ $message }} </span>
                @enderror         
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Slika</label>
                <input type="file" name="image" class="form-control" id="image">
                @error('image')
                    <span class='d-block -6 text-danger mt-2'> {{ $message }} </span>
                @enderror
            <div class="mt-3">
                
                <button type="submit" class="btn btn-dark mb-2 btn-sm"> Azuriraj </button>
            </div>
        </form>
        @else
            <p style="font-family: Arial, Helvetica, sans-serif" class="fs-6 fw-normal mb-3">
                {{$objava->objava}}
            </p>
        @endif
        <div>
            <img class="img-fluid mb-3 rounded-3 border border-1" src="{{ $objava->getImageURL() }}" alt="">
        </div>
        <div class="d-flex mb-2">
            @include('objave.shared.like-button')
            
            @auth()
            <a href="{{ route('objava.show', $objava->id) }}" class="fw-light nav-link fs-6"> <span class="far fa-comment me-1">
            </span> {{ $objava->komentari()->count() }} </a>
            @endauth
            @guest()
            <a href="{{ route('login') }}" class="fw-light nav-link fs-6"> <span class="far fa-comment me-1">
                </span> {{ $objava->komentari()->count() }} </a>
            @endguest
            
        </div>
        @auth()
        <form action="{{ route("objava.komentari.store", $objava->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <textarea name="sadrzaj" class="fs-6 form-control" rows="1" required></textarea>
            </div>
            <div>
                <button type="submit" class="btn btn2-outline-custom-color btn-sm"> Komentiraj </button>
            </div>
            @endauth
        </form>
    </div>
</div>

<script>
    function deleteIdea(event) {
        if (confirm('Jeste li sigurni da želite obrisati ovu objavu?')) {
            event.target.closest('form').submit();
        } else {
            event.preventDefault();
        }
    }
</script>

<style>
    .fa-pen-to-square:hover {
        color: #216caa;
    }
    .fa-eye:hover {
        color: #2171b4;
    }
    .fa-trash-can:hover {
        color: red;
    }
    .fa-comment:hover {
        color: #2171b4;
    }
</style>