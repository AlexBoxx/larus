@extends('admin.layouts.app_admin')

@section('content')
	<div class="container">

		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{route('admin.index')}}"> Панель </a></li>
			<li class="breadcrumb-item active">{{$title}}</li>
		</ol>


		<a href="{{route('admin.country.create')}}" class="btn btn-success pull-left"> <i class="ion-a-add-circle"></i> Добавить страну</a>

		<div class="row w-100 mt-3 mb-3"></div>

		<div class="row">
			@forelse($countres as $key_list)
					<div class="accordion">
						<div class="accordion_header">
						  <div class="content">
						    <div class="col-7 text-truncate">{{$key_list->title}} </div>

								<div class="col-2 text-center"><a href="{{route('admin.countryRegion', $key_list )}}" class="btn btn-info" title="Регионов">{{$key_list->regions->count()}}</a> </div>

						    <div class="col-3 text-right">

						      <form onsubmit="if(confirm('Удалить?')){ return true }else{ return false }" action="{{route('admin.country.destroy', $key_list)}}" method="post">
						          {{ method_field('DELETE')}}
						        {{ csrf_field() }}

						        <a href="{{route('admin.country.edit', $key_list)}}" class="btn btn-outline-blue" title="Редактировать"> <i class="ion-edit"></i> </a>

						        <button type="submit"  title="Удалить"
										@if ( $key_list->regions->count() > 0 )
											class="btn btn-secondary"
											onClick="alert('Удалите или переместите Разделы'); return false;"
										@else
											class="btn btn-danger"
										@endif
										> <i class="fa fa-trash-o"></i> </button>

						      </form>
						    </div>

						  </div>
						</div>
					</div> <!-- end accordion -->

			@empty


		<div class="accordion text-center"> <h5>Данные не получены.</h5> </div>

			@endforelse


						<nav aria-label="Page navigation example" class="pagination justify-content-end">
								{{ $countres->links() }}
						</nav>


					</div>


	</div>
@endsection
