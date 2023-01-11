@extends('master-auth')

@section('auth')
<div class="col-lg-5 col-12">
    <div id="auth-left">
        <div class="auth-logo">
            <a href="index.html"><img src="{{asset('mazer')}}/assets/images/logo/logo.svg" alt="Logo"></a>
        </div>
        <h1 class="auth-title">Sign Up</h1>
        <p class="auth-subtitle mb-5">Input your data to register to our website.</p>

        <form action="{{ route('postsignup') }}" method="POST">
            @csrf
            <div class="form-group position-relative has-icon-left mb-4">
                <input type="text" class="form-control form-control-xl" id="username" name="username" placeholder="Username" autofocus>
                <div class="form-control-icon">
                    <i class="bi bi-person"></i>
                </div>
                @if ($errors->has('username'))
                <span class="text-danger">{{ $errors->first('username') }}</span>
                @endif
            </div>
            <div class="form-group position-relative has-icon-left mb-4">
                <input type="text" class="form-control form-control-xl" id="email" name="email" placeholder="Email" autofocus>
                <div class="form-control-icon">
                    <i class="bi bi-envelope"></i>
                </div>
                @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-group position-relative has-icon-left mb-4">
                <input type="password" class="form-control form-control-xl" id="password" name="password" placeholder="Password">
                <div class="form-control-icon">
                    <i class="bi bi-shield-lock"></i>
                </div>
                @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit">Sign Up</button>
        </form>
        <div class="text-center mt-5 text-lg fs-4">
            <p class='text-gray-600'>Already have an account? <a href="auth-login.html" class="font-bold">Login</a>.</p>
        </div>
    </div>
</div>
@endsection
