@auth()
<div>
    <form action="{{ route("objava.komentari.store", $objava->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <textarea name="sadrzaj" class="fs-6 form-control" rows="1" required></textarea>
        </div>
        <div>
            <button type="submit" class="btn btn2-outline-custom-color btn-sm"> Objavi komentar </button>
        </div>
    </form>

    <hr>
    @foreach ($objava->komentari as $komentar)
        
    <div class="d-flex align-items-start">
        <img style="width:35px" class="me-2 avatar-sm rounded-circle"
            src={{ $komentar->user->getImageURL() }}
            alt="{{ $komentar->user->name }}">
        <div class="w-100">
            <div class="d-flex justify-content-between">
                <h6 class=""> <a class="text-decoration-none link-dark" href="{{ route('users.show', $komentar->user->id) }}"> <span class="fs-6 text-muted">{{'@' . $komentar->user->username }}</span> </a>
                </h6>

                <div>
                    @if (auth()->user()->id == $komentar->user->id)
                    <form action="{{ route('komentari.destroy', $komentar->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-outline-custom-color">Obriši komentar</button>
                    </form>
                    @endif
                </div>

                <small class="fs-6 fw-light text-muted"> {{ $komentar->created_at->diffForHumans() }} </small>
            </div>
            <p style="font-family: Arial, Helvetica, sans-serif" class="fs-7">
                {{ $komentar->sadrzaj }}
            </p>
            <hr>
        </div>
    </div>
    @endforeach
</div>
@endauth

<style>
    .btn2-outline-custom-color {
        border-color: #00437a;
        color: #00437a;
    }

    .btn2-outline-custom-color:hover {
        background-color: #00437a;
        color: white;
    }

    .btn-outline-custom-color {
        border-color: #ed1c24;
        color: #ed1c24;
    }

    .btn-outline-custom-color:hover {
        background-color: #ed1c24;
        color: white;
    }
</style>