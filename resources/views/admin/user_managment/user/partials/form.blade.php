
@if($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>
@endif

<label for=""> NikName на сайте </label>
<input type="text" class="form-control" name="name" placeholder="Введите NikName на сайте" value="@if(old('name')){{old('name')}}@else @isset($user->name){{$user->name}}@endisset @endif" required>

<label for=""> Email адрес</label>
<input type="text" class="form-control" name="email" placeholder="Введите адрес" value="@if(old('email')){{old('email')}}@else @isset($user->email){{$user->email}}@endisset @endif" required>

<label for=""> Пароль</label>
<input type="password" class="form-control" name="password">

<label for="">Повторите Пароль</label>
<input type="password" class="form-control" name="password_confirmation">

<hr/>
<input type="submit" name="some name" class="btn btn-success" value="Сохранить"/>
