@if($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>
@endif

<label for=""> Название региона </label>
<input type="text" class="form-control" name="title" placeholder="Введите Название региона" value="{{$region->title or ''}}" required>

@foreach($countres as $country_list)

    <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="country_id" id="country{{ $country_list->id }}" value="{{ $country_list->id }}"
@isset($region->id))
    @if($country_list->id == $region->country_id)
        checked="checked"
      @endif
  @endisset

  @if($country_list->id == $country->id)
    checked="checked"
  @endif

  @if($country_list->id ==1)
    checked="checked"
  @endif
  >
    <label class="form-check-label" for="country{{ $country_list->id }}"> {{ $country_list->title }}</label>
    </div>

@endforeach
<hr/>
<input type="submit" name="some name" class="btn btn-success" value="Сохранить"/>
