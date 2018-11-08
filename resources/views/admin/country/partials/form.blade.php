@if($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>
@endif

<label for=""> Название страны </label>
<input type="text" class="form-control" name="title" placeholder="Введите Название страны" value="{{$country->title or ''}}" required>

<hr/>
<input type="submit" name="some name" class="btn btn-success" value="Сохранить"/>
