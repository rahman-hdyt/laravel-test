@extends('master-auth')

@section('auth')
<div class="auth-form">
    <div class="text-center mb-3">
        <a href="index.html"><img src="{{ asset('jobie') }}/images/appschool.png" alt=""></a>
    </div>
    <h4 class="text-center mb-4 text-white">Sign up your account</h4>
    <form action="{{ route('postsignup') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label class="mb-1 text-white"><strong>Nama</strong></label>
            <input type="text" class="form-control" placeholder="Nama" id="name" name="name" required autofocus>
        </div>
        <div class="form-group">
            <label class="mb-1 text-white"><strong>Username</strong></label>
            <input type="text" class="form-control" placeholder="Username" id="username" name="username" required autofocus>
        </div>
        <div class="form-group">
            <label class="mb-1 text-white"><strong>Email</strong></label>
            <input type="email" class="form-control" placeholder="hello@example.com" id="email" name="email" required autofocus>
        </div>
        <div class="form-group">
            <label class="mb-1 text-white"><strong>Password</strong></label>
            <input type="password" class="form-control" id="password" name="password" placeholder="•••••••••" required>
        </div>
        <div class="form-group">
            <label class="mb-1 text-white"><strong>Foto</strong></label>
            <input type="file" name="image" id="image" class="form-file-input form-control @error('image') is-invalid @enderror" required>
        </div>
        <div class="text-center mt-4">
            <button type="submit" class="btn bg-light text-primary btn-block">Register</button>
        </div>
    </form>
    <div class="new-account mt-3">
        <p class="text-white">Already have an account? <a class="text-white" href="{{ route('login') }}">Sign in</a></p>
    </div>
</div>
@endsection
