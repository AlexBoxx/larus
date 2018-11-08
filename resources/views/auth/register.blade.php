@extends('auth.layouts.app')

@section('content')

<div class="card card-login ">
<div class="card-header text-center">
  <img src="{{ asset('school/img/logo300.png') }}" class="logo-aus"/>
</div>
<div class="card-body">

  <div class="col-12 link text-center"> <h6>Регистрация по email</h6>
    </div>

    <hr/>


  <form class="loginert" method="POST" action="{{ route('register') }}">
    @csrf

    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-default" ><i class="fa fa-user-circle-o"></i></span>
      </div>
        <input  type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="name" placeholder="Введите Ваше имя для сайта">

      @if ($errors->has('name'))
          <span class="invalid-feedback" role="alert">
              {{ $errors->first('name') }}
          </span>

      @endif

    </div>

    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-default" ><i class="fa fa-envelope-o"></i></span>
      </div>

      @if ($errors->has('email'))

          <input  id="email" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" style="border: 1px solid red;" name="email" value="{{ old('email') }}" aria-label="Small" aria-describedby="inputGroup-sizing-sm" autofocus placeholder="Введите Ваш Email">
          <span class="invalid-feedback" role="alert">
              {{ $errors->first('email') }}
          </span>

          @else
          <input  id="email" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Введите Ваш Email">
      @endif

    </div>



    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-default" ><i class="fa fa-unlock-alt"></i></span>
      </div>
      <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="password" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Введите Ваш пароль">

      @if ($errors->has('password'))
          <span class="invalid-feedback" role="alert">
            {!! $errors->first('password') !!}
          </span>
      @endif


    </div>


    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-default" ><i class="fa fa-unlock-alt"></i></span>
      </div>
      <input type="password" class="form-control" name="password_confirmation" id="password-confirm" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Повторите Ваш пароль">

    </div>


    <button type="submit" class="btn btn-success w-75" style="margin: 0.01em 10%;">{{ __('messages.Register') }}</button>

  </form>

  <p class="text-center mt-3"><a href="{{ route('login') }}" class="btn btn-outline-blue">Войти через соцсети</a></p>


</div>
</div>
@endsection
