@extends('layouts.preskin')

@section('form')
<div class="col-lg-4 mx-auto">
  <div class="auth-form-light text-left p-5">
    <div class="brand-logo">
      <img src="{{ asset('images/logo.PNG')}}">
    </div>
    <h4>New here?</h4>
    <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
    <form class="pt-3" method="POST" action="{{ route('register') }}">
      @csrf
      <div class="form-group">
        <input type="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} form-control-lg" id="name" name="name" placeholder="full name" value="{{ old('name') }}" required autofocus>
        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group">
        <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }} form-control-lg" placeholder="username" name="username" value="{{ old('username') }}" required autofocus>

        @if ($errors->has('username'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('username') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group">
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} form-control-lg" placeholder="e-mail" name="email" value="{{ old('email') }}" required>

        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
      </div>

      <div class="form-group">
        <select class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} form-control-lg" id="department" name="department" placeholder="select department">
          <option value="">--select department--</options>
          <option value="Information Technology">Information Technology - IT</option>
          <option value="Sales - Marketing">Sales - Marketing</option>
          <option value="Accounts - Admin">Accounts - Administration</option>
          <option value="Operations">Operations</option>
        </select>
      </div>

      <div class="form-group">
        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} form-control-lg" placeholder="password" name="password" required>

        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
      </div>


      <div class="form-group">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="repeat password" required>
      </div>
      <div class="mb-4">
        <div class="form-check">
          <label class="form-check-label text-muted">
            <input type="checkbox" class="form-check-input">
            I agree to all Terms & Conditions
          </label>
        </div>
      </div>
      <div class="mt-3">
        <button type="submit" class="btn btn-block btn-gradient-success btn-lg font-weight-medium auth-form-btn">{{ __('Register') }}</button>
      </div>
      <div class="text-center mt-4 font-weight-light">
        Already have an account? <a href="{{ route('login')}}" class="text-primary">Login</a>
      </div>
    </form>
  </div>
</div>
@endsection
