<div class="card">
    <div class="px-3 pt-4 pb-2">
        <form enctype="multipart/form-data" method="POST" action="{{ route('users.update', $user->id) }}">
            @csrf
            @method('PUT')
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                    src={{ $user->getImageURL() }} alt="Profilna slika">
                <div>
                        <input name="name" value="{{ $user->name }}" type="text" class="form-control">
                        @error('name')
                            <div class="text-danger fs6">{{ $message }}</div>
                        @enderror
                </div>
            </div>
            <div>
                <div>
                    @auth()
                        @if (Auth::id() == $user->id)
                            <a class="btn btn-dark" href="{{ route('users.show', $user->id) }}">Prekini uređivanje</a>
                        @endif
                    @endauth
                </div>
            </div>

        </div>

            <div class="mt-3">
                <label for="" >Slika profila</label>
                <input type="file" name="image" class="form-control" id="">
                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <hr>

        <div class="px-2 mt-4">
            <h5 class="fs-5"> O meni : </h5>

                <div class="mb-4">
                    <textarea name="bio" class="form-control" id="bio" rows="3"> {{ $user->bio }} </textarea>
                    @error('bio')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <hr>

            <h5 class="fs-5 mt-2">Promjena lozinke :</h5>

                <div class="mb-3">
                    <label for="old_password" class="form-label">Stara lozinka</label>
                    <input type="password" name="old_password" class="form-control" id="old_password">
                    @error('old_password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Nova lozinka</label>
                    <input type="password" name="password" class="form-control" id="password">
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Potvrdi novu lozinku</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                    @error('password_confirmation')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button class="btn btn-dark mb-3">Spasi izmjene</button>
        </div>
    </form>
    </div>
</div>