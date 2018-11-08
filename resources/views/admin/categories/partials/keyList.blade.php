@if ($key_list->parent_id == 0)
<div class="accordion_header">
  <div class="content">
    <div class="col-5 text-truncate"><span>
      @if($key_list->publisched == 0)
      <i class="ion-a-checkbox-outline-blank text-secondary" title="Не опубликовано"></i>
      @else
      <i class="ion-a-checkbox-outline text-success" title="Опубликовано"></i>
      @endif</span> | <span class="text-uppercase">{{$key_list->title}}</span></div>
@else
<div class="accordion_content">
  <div class="content">
    <div class="col-5 text-truncate">-<span>
      @if($key_list->publisched == 0)
      <i class="ion-a-checkbox-outline-blank text-secondary" title="Не опубликовано"></i>
      @else
      <i class="ion-a-checkbox-outline text-success" title="Опубликовано"></i>
      @endif</span> | {{$key_list->title}}</div>
@endif
    <div class="col-2 text-center">
      @if ($key_list->parent_id == 0 && count($key_list->children) > 0)<button type="button" class="btn btn-outline-secondary click"><i class="fa fa-sort-amount-asc"></i></button>@endif
    </div>
    <div class="col-2 text-center"><a href="{{route('admin.catArticles', $key_list)}}" class="btn btn-outline-blue" title="Статей">{{$key_list->articles()->count()}}</a></div>
    <div class="col-3 text-right">

      <form onsubmit="if(confirm('Удалить?')){ return true }else{ return false }" action="{{route('admin.category.destroy', $key_list)}}" method="post">
          {{ method_field('DELETE')}}
        {{ csrf_field() }}

        <a href="{{route('admin.category.edit', $key_list)}}" class="btn btn-outline-warning" title="Редактировать"> <i class="ion-edit"></i> </a>

        <button type="submit"  title="Удалить"

        @if ($key_list->articles()->count() > 0 )
          class="btn btn-secondary"
          onClick="alert('Удалите или переместите Материалы'); return false;"
        @else
          @if ($key_list->parent_id == 0)
            @if (count($key_list->children) > 0)
                class="btn btn-secondary"
                onClick="alert('Удалите или переместите Подразделы'); return false;"
              @else
                class="btn btn-danger"
            @endif
            @else
              class="btn btn-danger"
          @endif
        @endif

        > <i class="fa fa-trash-o"></i></button>

      </form>
    </div>

  </div>
</div>
