@extends('auth.layouts.app')

@section('content')

    <div class="card card-login ">
    <div class="card-header text-center">
      <img src="{{ asset('school/img/logo300.png') }}" class="logo-aus"/>
    </div>
    <div class="card-body">

      <div class="col-12 link text-center"> <h6>Войдите с помощью :</h6>
        <div class="soc-login">
          <a href="#"><div class="vk"><i class="fa fa-vk" aria-hidden="true"></i></div></a>
          <a href="#"><div class="ok"><i class="fa fa-odnoklassniki" aria-hidden="true"></i></div></a>
          <a href="#"><div class="fb"><i class="fa fa-facebook" aria-hidden="true"></i></div></a>
          <a href="#"><div class="ins"><i class="fa fa-instagram" aria-hidden="true"></i></div></a>
          <a href="#"><div class="goo"><i class="fa fa-google" aria-hidden="true"></i></div></a>

        </div></div>

        <hr/>
      <form class="loginert" method="POST" action="{{ route('login') }}">
        @csrf

        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default" ><i class="fa fa-envelope-o"></i></span>
          </div>
          <input  type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="email" required autofocus placeholder="{{ __('messages.Enter Your Email') }}">

          @if ($errors->has('email'))
              <span class="invalid-feedback" role="alert">
                  {{ $errors->first('email') }}
              </span>
          @endif

        </div>

        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default" ><i class="fa fa-unlock-alt"></i></span>
          </div>
          <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required placeholder="{{ __('messages.Enter Your password') }}">
        </div>

        <div class="form-group form-check mt-3 ml-3">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">{{ __('messages.Remember me') }}</label>
        </div>

        <button type="submit" class="btn btn-success w-75" style="margin: 0.01em 10%;">{{ __('messages.Login') }}</button>

      </form>

      <hr/>
      <div class="text-center"><a href="{{ route('register') }}" class="btn btn-outline-blue"> {{ __('messages.Register by Email') }}</a>  <a class="btn btn-outline-warning" href="{{ route('password.request') }}">{{ __('messages.Forgot Your Password?') }}</a></div>

    </div>
  </div>


@endsection
