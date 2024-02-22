@extends('backbutton')
@extends('layout.layout')

@section('content')
<div class="row">
            <div class="col-2">
                
            </div>
            <div class="col-8">
                @include('shared.success-msg')
                <div class="mt-3">
                    @include('shared.kartica_korisnika')                  
                </div>
                <hr>

                @forelse ($objave as $objava)
                    <div class="mt-3">
                        @include('shared.kartica_objave')
                    </div>
                @empty
                    <p class="text-center my-3">Nema objava za pretragu</p>
                @endforelse

                <div class="mt-3">
                    <!-- dodaj tipke za paginaciju -->
                    {{ $objave->withQueryString()->links() }}
                </div>

            </div>
        </div>
@endsection