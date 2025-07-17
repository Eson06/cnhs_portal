@extends('back.layout.auth')
@section ('pageTitle',isset($pageTitle) ? $pageTitle : 'Login Page')
<link rel="manifest" href="{{ asset('/manifest.json') }}">
<script src="{{ asset('/sw.js') }}"></script>
@section('content')
<div class="container container-tight py-4">
  <div class="card shadow-lg" style="max-width: 600px; width: 100%; background-color: rgba(255, 255, 255, 0.85);">

    <div class="card-body">
        <div class="text-center mb-2">
            <a href="." class="navbar-brand navbar-brand-autodark">
              <img src="{{ asset('images/cnhs_logo.png ')}}" width="90" height="90" alt="CNHS">
            </a>
        </div>
        <h5 class="h5 text-center mb-1">Welcome to</h5>
        <h2 class="h2 text-center mb-4">Cabacao National High School Portal</h2>
     <div class="hr-text">Login to your account</div>


     @if(Session::get('fail'))
     <div class="alert alert-warning" role="alert">
        <div class="d-flex">
          <div>
            <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 9v4"></path><path d="M10.363 3.591l-8.106 13.534a1.914 1.914 0 0 0 1.636 2.871h16.214a1.914 1.914 0 0 0 1.636 -2.87l-8.106 -13.536a1.914 1.914 0 0 0 -3.274 0z"></path><path d="M12 16h.01"></path></svg>
          </div>
          <div>
            {{ Session::get('fail') }}
          </div>
        </div>
      </div>
     @endif
     @if(Session::get('ban'))
     <div class="alert alert-danger" role="alert">
        <div class="d-flex">
          <div>
            <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path><path d="M12 8v4"></path><path d="M12 16h.01"></path></svg>
          </div>
          <div>
            {{ Session::get('ban') }}
          </div>
        </div>
      </div>
      @endif
     <form action="{{ route('custom.login')}}" method="POST">
        @csrf
        <div class="mb-1">
          <label class="form-label">LRN/ID</label>
          <input type="text" class="form-control  @error('user_name') is-invalid   @enderror" placeholder="LRN/ID" autocomplete="off" name="user_name" autofocus>
          @error('user_name')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <div class="mb-1">
          <label class="form-label">Password</label>
          <input type="password" class="form-control  @error('password') is-invalid   @enderror"  placeholder="Password" name="password" autocomplete="off">
        @error('password')
            <span class="text-danger">{{ $message }}</span>
        @enderror

        </div>
        <div class="form-footer">
          <button type="submit" class="btn btn-primary w-100">Sign in</button>
        </div>
      </form>
    </div>
  
  </div>
</div>
<script>
 if ("serviceWorker" in navigator) {
            navigator.serviceWorker.register("/sw.js").then(
                (registration) => {
                    console.log("PWA is now fully prepared for use!");
                },
                (error) => {
                    console.error(`Service worker registration failed: ${error}`);
                },
			);
		} else {
			 console.error("Service workers are not supported.");
		}
</script>
@endsection
