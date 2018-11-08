<label for="">Статус</label>
<select class="form-control" name="publisched">
  @if (isset($article->id))
    <option value="0" @if ($article->publisched == 0) selected="" @endif > Не опубликовано </option>
    <option value="1" @if ($article->publisched == 1) selected="" @endif > Опубликовано </option>
  @else
    <option value="0" > Не опубликовано </option>
    <option value="1"> Опубликовано </option>
  @endif
</select>

<label for=""> Заголовок </label>
<input type="text" class="form-control" name="title" placeholder="Заголовок новости" value="@isset($article->title){{$article->title}}@endisset" required>

<label for=""> Slug (уникальное значение) </label>
<input class="form-control" type="text" name="slug" placeholder="Автоматическая генерация" value="@isset($article->slug){{$article->slug}}@endisset" readonly="">

<label for=""> Родительская категория</label>
<select class="form-control" name="categories[]" multiple="">
  <option value="0" > -- без родительской --</option>
  @include('admin.articles.partials.categories', ['categories'=>$categories])
</select>

<label for=""> Краткое описание</label>
<textarea class="form-control" id="description" name="description">@isset($article->description){{$article->description}}@endisset</textarea>

<label for=""> Полное описание</label>
<textarea class="form-control" id="text" name="text">@isset($article->text){{$article->text}}@endisset</textarea>

<label for=""> Meta Заголовок </label>
<input type="text" class="form-control" name="meta_title" placeholder="Meta заголовок" value="@isset($article->meta_title){{$article->meta_title}}@endisset">

<label for=""> Meta описание </label>
<input type="text" class="form-control" name="meta_description" placeholder="Meta описание" value="@isset($article->meta_description){{$article->meta_description}}@endisset">

<label for=""> Meta ключи </label>
<input type="text" class="form-control" name="meta_key" placeholder="Meta ключи через запятую" value="@isset($article->meta_key){{$article->meta_key}}@endisset">

<hr/>
<input type="submit" name="some name" class="btn btn-success" value="Сохранить"/>
