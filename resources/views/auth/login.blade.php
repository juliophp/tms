@extends('layouts.preskin')

@section('form')
<div class="col-lg-4 mx-auto">
  <div class="auth-form-light text-left p-5">
    <div class="brand-logo">
      <img src="{{ asset('images/logo.PNG')}}">
    </div>
    <h4>Hello! let's get started</h4>
    <h6 class="font-weight-light">Sign in to continue.</h6>
    <form class="pt-3" method="POST" action="{{ route('login') }}">
      @csrf
      <div class="form-group">
        <input type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }} form-control-lg"  name="username" id="username" placeholder="{{ __('Staff Id:') }}" value="{{ old('username') }}" required autofocus>

        @if ($errors->has('username'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('username') }}</strong>
            </span>
        @endif
      </div>

      <div class="form-group">
        <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} form-control-lg" id="password" placeholder="{{ __('Password') }}" required>
        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
      </div>
      <div class="mt-3">
        <button class="btn btn-block btn-gradient-success btn-lg font-weight-medium auth-form-btn" type="submit">
          {{ __('Login') }}
        </button>
      </div>
      <div class="my-2 d-flex justify-content-between align-items-center">
        <div class="form-check">
          <label class="form-check-label text-muted">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            Remember Me
          </label>
        </div>
        <a href="{{ route('password.request') }}" class="auth-link text-black">Forgot password?</a>
      </div>
      <div class="text-center mt-4 font-weight-light">
        Don't have an account? <a href="{{ route('register')}}" class="text-primary">Create</a>
      </div>
    </form>
  </div>
</div>
@endsection
