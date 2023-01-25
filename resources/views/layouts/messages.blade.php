<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">

            @if(Session::has('ok'))
            <h3 class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('ok') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </h3>
            @endif

            @if(Session::has('oki'))
            <h3 class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('oki') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </h3>
            @endif

            @if(Session::has('not'))
            <h3 class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ Session::get('not') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </h3>
            @endif

            @if(Session::has('bad'))
            <h3 class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ Session::get('bad') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </h3>
            @endif

            @if(Session::has('nokis'))
            <h3 class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ Session::get('nokis') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </h3>
            @endif

            @if(Session::has('update'))
            <h3 class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('update') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </h3>
            @endif

            @if(Session::has('upi'))
            <h3 class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('upi') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </h3>
            @endif

            @if(Session::has('lesos'))
            <h3 class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('lesos') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </h3>
            @endif

            @if(Session::has('okis'))
            <h3 class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('okis') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </h3>
            @endif

            @if($errors)
            @foreach ($errors->all() as $message)
            <h3 class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </h3>
            @endforeach
            @endif

        </div>
    </div>
</div>
