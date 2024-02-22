
    @section('hero')
    <div class="w-full text-center py-32">
        <h1 class="text-2xl md:text-3xl font-bold text-center lg:text-5xl text-gray-700">
            Dobrodošli na  Mrežu</span>
        </h1>
        <br>
        <p class="text-gray-500 text-lg mt-1">Najbolja mreža za studente</p>
        <a class="px-3 py-2 text-lg text-white bg-sumplava rounded mt-5 inline-block"
            href="http://127.0.0.1:8000/blog">Počni objavljivati</a>
    </div>
    @endsection

    <div class="mb-10 w-full">
        <div class="mb-16">
            <h2 class="mt-16 mb-5 text-3xl text-sumplava font-bold">Predložene objave</h2>
            <div class="w-full">
                <div class="grid grid-cols-3 gap-10 w-full">
                </div>
            </div>
            <a class="mt-10 block text-center text-lg text-sumplava font-semibold"
                href="http://127.0.0.1:8000/blog">More
                Posts</a>
        </div>
        <hr>

        <h2 class="mt-16 mb-5 text-3xl text-sumplava font-bold">Posljednje objave</h2>
        <div class="w-full mb-5">
            <div class="grid grid-cols-3 gap-10 w-full">
        </div>
        </div>
        <a class="mt-10 block text-center text-lg text-sumplava font-semibold"
            href="http://127.0.0.1:8000/blog">Prikaži više objava</a>
    </div>
