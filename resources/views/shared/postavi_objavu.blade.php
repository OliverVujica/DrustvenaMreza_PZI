@auth()
<h4> Objavi nešto zanimljivo </h4>
<div class="row">
    <form action="{{ route('objava.create') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <textarea name='objava' class="form-control" id="idea" rows="3"></textarea>
            <!-- Ako imamo gresku u objavi, postavljena u kontroleru za objavu, koristi blade funkciju error -->
            @error('objava')
                <span class='d-block -6 text-danger mt-2'> {{ $message }} </span>
            @enderror
        </div>

        <div class="mt-3 mb-3">
            <label for="" >Izaberi sliku:</label>
            <input type="file" name="image" class="form-control" id="">
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="">
            <button type="submit" class="btn btn2-outline-custom-color"> Objavi </button>
        </div>
    </form>
</div>
@endauth
@guest()
    <h5 text-decoration: none;>
        <a style="color:#00437a " class="text-decoration-none" href="{{ route('login') }}"> Prijavi se</a>, <br>kako bi mogao objavljivati
    </h5>
@endguest

<style>
    .btn2-outline-custom-color {
        color: #00437a;
        border-color: #00437a;
    }

    .btn2-outline-custom-color:hover {
        background-color: #00437a;
        color: white;
    }
</style>