@extends('admin.layouts.app_admin')

@section('content')
	<div class="container">

		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{route('admin.index')}}"> Панель </a></li>
      <li class="breadcrumb-item"><a href="{{route('admin.category.index')}}"> Разделы </a></li>
			<li class="breadcrumb-item"><a href="{{route('admin.article.index')}}"> Статьи </a></li>
			<li class="breadcrumb-item active">{{$title}}</li>
		</ol>


	<p>
		<a href="{{route('admin.article.create')}}" class="btn btn-sm btn-success"> <i class="ion-a-add-circle"></i> Создать новость</a> |
		<a href="{{route('admin.category.index')}}" class="btn btn-sm btn-outline-info"> <i class="ion-funnel"></i> По разделам </a>  |
		<a href="{{route('admin.article.public', 1)}}" class="btn btn-sm btn-outline-warning"> <i class="ion-funnel"></i> Опубликовано  </a>
		|
		<a href="{{route('admin.article.public', 0)}}" class="btn btn-sm btn-outline-danger"> <i class="ion-funnel"></i> Не опубликовано </a>

		</p>


		<div class="row w-100 mt-3 mb-3"></div>

		<div class="row">
			@forelse($articles as $key_list)
					<div class="accordion">
						<div class="accordion_header">
						  <div class="content">
						    <div class="col-9 text-truncate"><span>
						      @if($key_list->publisched == 0)
						      <i class="ion-a-checkbox-outline-blank text-secondary" title="Не опубликовано"></i>
						      @else
						      <i class="ion-a-checkbox-outline text-success" title="Опубликовано"></i>
						      @endif</span> | {{$key_list->title}} </div>

						    <div class="col-3 text-right">

						      <form onsubmit="if(confirm('Удалить?')){ return true }else{ return false }" action="{{route('admin.article.destroy', $key_list)}}" method="post">
						          {{ method_field('DELETE')}}
						        {{ csrf_field() }}

						        <a href="{{route('admin.article.edit', $key_list)}}" class="btn btn-outline-warning" title="Редактировать"> <i class="ion-edit"></i> </a>

						        <button type="submit" class="btn btn-outline-danger"  title="Удалить"> <i class="fa fa-trash-o"></i></button>

						      </form>
						    </div>

						  </div>
						</div>
					</div> <!-- end accordion -->

			@empty


		<div class="accordion text-center"> <h4>Данные не получены.</h4> </div>

			@endforelse


						<nav aria-label="Page navigation example" class="pagination justify-content-end">
								{{ $articles->links() }}
						</nav>


					</div>



	</div>
@endsection
