<label for="">Статус</label>
<select class="form-control" name="publisched">
  @if (isset($category->id))
    <option value="0" @if ($category->publisched == 0) selected="" @endif > Не опубликовано </option>
    <option value="1" @if ($category->publisched == 1) selected="" @endif > Опубликовано </option>
  @else
    <option value="0" > Не опубликовано </option>
    <option value="1"> Опубликовано </option>
  @endif
</select>

<label for=""> Наименование</label>
<input type="text" class="form-control" name="title" placeholder="Заголовок категории" value="@isset($category->title){{$category->title}}@endisset" required>

<label for=""> Slug </label>
<input class="form-control" type="text" name="slug" placeholder="Автоматическая генерация" value="@isset($category->slug){{$category->slug}}@endisset" readonly="">

<label for=""> Родительская категория</label>
<select class="form-control" name="parent_id">
  <option value="0" > -- без родительской --</option>
  @include('admin.categories.partials.categories', ['categories'=>$categories])
</select>

<hr/>
<input type="submit" name="some name" class="btn btn-success" value="Сохранить"/>
