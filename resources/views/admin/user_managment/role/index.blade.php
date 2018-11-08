@extends('admin.layouts.app_admin')

@section('content')
	<div class="container">

		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{route('admin.index')}}"> Панель </a></li>
			<li class="breadcrumb-item active">{{$title}}</li>
		</ol>


		<a href="{{route('admin.user_managment.role.create')}}" class="btn btn-success pull-left"> <i class="ion-a-add-circle "></i> Добавить роль</a>


		<div class="row w-100 mt-3 mb-3"></div>

			<div class="row">
				@forelse($roles as $key_list)
				<div class="accordion">

				@include('admin.user_managment.role.partials.roles')

				@if (count($key_list->children) > 0)

					@foreach ($key_list->children as $key_list)
							@include('admin.user_managment.role.partials.roles')
					@endforeach
				@endif
						</div> <!-- end accordion -->

				@empty


			<div class="accordion text-center"> <h4>Данные не получены.</h4> </div>

				@endforelse


							<nav aria-label="Page navigation example" class="pagination justify-content-end">
									{{ $roles->links() }}
							</nav>


						</div>
	</div>
@endsection
