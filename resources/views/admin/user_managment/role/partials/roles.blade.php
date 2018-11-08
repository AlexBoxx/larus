@if ($key_list->parent_id == 0)
<div class="accordion_header">
  <div class="content">
    <div class="col-5"><span class="text-uppercase">{{$key_list->title}}</span></div>
@else
<div class="accordion_content">
  <div class="content">
    <div class="col-5">- {{$key_list->title}}</div>
@endif
    <div class="col-2">
      @if ($key_list->parent_id == 0 && count($key_list->children) > 0)<button type="button" class="btn btn-outline-secondary click"><i class="fa fa-sort-amount-asc"></i></button>@endif
    </div>
    <div class="col-2"><a href='#' class="btn btn-outline-blue" title="Человек">15</a></div>
    <div class="col-3 text-right">

      <form onsubmit="if(confirm('Удалить?')){ return true }else{ return false }" action="{{route('admin.user_managment.role.destroy',$key_list)}}" method="post">
          {{ method_field('DELETE')}}
        {{ csrf_field() }}

        <a href="{{route('admin.user_managment.role.edit', $key_list)}}" class="btn btn-outline-warning" title="Редактировать"> <i class="ion-edit"></i> </a>

        <button type="submit"  title="Удалить"
        @if ($key_list->parent_id == 0)
          @if (count($key_list->children) > 0)
              class="btn btn-secondary"
              onClick="alert('Удалите Подразделы'); return false;"
            @else
              class="btn btn-danger"
          @endif
          @else
            class="btn btn-danger"
        @endif> <i class="fa fa-trash-o"></i></button>

      </form>
    </div>

  </div>
</div>
