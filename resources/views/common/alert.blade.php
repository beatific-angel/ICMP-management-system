{{-- Message --}}
@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <i class="material-icons f-left"></i>
        <strong>Success !</strong> {{ session('success') }}
    </div>
@endif

@if (Session::has('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <i class="material-icons f-left"></i>
        <strong>Error !</strong> {{ session('error') }}
    </div>
@endif
