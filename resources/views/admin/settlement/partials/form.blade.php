@if($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>
@endif

<label for=""> Название </label>
<input type="text" class="form-control" name="title" placeholder="Введите Название Нас.Пункта или Района" value="{{$settlement->title or ''}}" required>

@isset($country)
  <input type="hidden" name="country_id" value="{{$country->id}}">
@endisset

@isset($countres)
  <div class="row w-100 mt-3 mb-3"></div>
    @foreach($countres as $country_list)
    <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="country_id" id="country{{ $country_list->id }}" value="{{ $country_list->id }}">
      <label class="form-check-label" for="country{{ $country_list->id }}"> {{ $country_list->title }}</label>
      </div>
    @endforeach

@endisset

<div class="row w-100 mt-3 mb-3"></div>

<div class="row">
  <div class="col-12 col-sm-6">
    <label for=""> Регион, область, край</label>
    <select class="form-control" name="region_id">

      <option class="0" value="0" > -- без региона --</option>

      @foreach ($regions as $key_list)

        @if(isset($region))
          @if($key_list->id == $region->id)
           <option class="{{$key_list->country_id}}" value="{{$key_list->id}}" selected> {{ $key_list->title }}</option>
          @else
           <option class="{{$key_list->country_id}}" value="{{$key_list->id}}"> {{ $key_list->title }} </option>
          @endif
        @else
          <option class="{{$key_list->country_id}}" value="{{$key_list->id}}"> {{ $key_list->title }} </option>
        @endif

      @endforeach

    </select>
  </div>

  <div class="col-12 col-sm-6">
    @if (!empty($settlements))
      <label>Относится к Нас.Пункту </label>
      <select class="form-control" name="parent_id">

        <option value="0" > -- без отношения --</option>

        @foreach($settlements as $sett_list)
            @if($sett_list->id != $settlement->id)
              <option value="{{ $sett_list->id }}" @if(!empty($settlement)) @if($sett_list->id == $settlement->parent_id ) selected @endif @endif>{{$sett_list->title}} </option>
            @endif

        @endforeach

      </select>
    @endif

  </div>

</div>
<hr/>

<input type="submit" name="some name" class="btn btn-success" value="Сохранить"/>
