@if(session()->has('alert-success'))
    <div class="alert alert-success">
        {{ session('alert-success') }}
    </div>
@elseif(session()->has('alert-error'))
    <div class="alert alert-danger">
        {{ session('alert-error') }}
    </div>
@endif
