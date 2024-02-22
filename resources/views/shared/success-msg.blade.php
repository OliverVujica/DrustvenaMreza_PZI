<!-- provjeri imamo li sesiju, ako imamo pokazi poruku uspjeha, koristimo blade funkcije-->
@if (session()->has('uspjesno'))
    
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('uspjesno') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

@endif