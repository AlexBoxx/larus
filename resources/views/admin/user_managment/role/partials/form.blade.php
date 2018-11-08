
@if($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>
@endif

<label for=""> Название роли </label>
<input type="text" class="form-control" name="title" placeholder="Введите название роли" value="@if(old('title')){{old('title')}}@else @isset($role->title){{$role->title}}@endisset @endif" required>

<label for="">Алиас для программы</label>
  @if(!empty($role->alias))
    <input class="form-control" type="text" name="slug" placeholder="Не редактируется $role->alias" value="@isset($role->alias){{$role->alias}}@endisset" readonly="">
  @else
    <input type="text" class="form-control" name="alias" placeholder="Введите алиас" value="@if(old('alias')){{old('alias')}}@else @isset($role->alias){{$role->alias}}@endisset @endif" required>
  @endif
<label for=""> Родительская роль</label>
<select class="form-control" name="parent_id">
  <option value="0" > -- без родительской --</option>
  @include('admin.categories.partials.categories', ['categories'=>$roles, 'category'=>$role])
</select>


<hr/>
<input type="submit" name="some name" class="btn btn-success" value="Сохранить"/>
