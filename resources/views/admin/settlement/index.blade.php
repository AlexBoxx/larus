@extends('admin.layouts.app_admin')

@section('content')
	<div class="container">

		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{route('admin.index')}}"> Панель </a></li>
      <li class="breadcrumb-item"><a href="{{route('admin.country.index')}}"> Страны </a></li>
			@isset($country)
				<li class="breadcrumb-item"><a href="{{route('admin.countryRegion', $country)}}"> {{ $country->title }} </a></li>
			@endisset

			<li class="breadcrumb-item active">{{$title}}</li>
		</ol>


			<a href="
			@if(isset($region['id']))
				{{route('admin.settlementCreate', $region)}}
			@else
				{{route('admin.settlement.create')}}
			@endif" class="btn btn-success pull-left"> <i class="ion-a-add-circle"></i> Добавить нас.пункт</a>


		<div class="row w-100 mt-3 mb-3"></div>

		<div class="row">
			@forelse($settlements as $key_list)
			<div class="accordion">

			@include('admin.settlement.partials.settlement')

			@if (count($key_list->children) > 0)

				@foreach ($key_list->children as $key_list)
						@include('admin.settlement.partials.settlement')
				@endforeach
			@endif
					</div> <!-- end accordion -->

			@empty


		<div class="accordion text-center"> <h4>Данные не получены.</h4> </div>

			@endforelse


						<nav aria-label="Page navigation example" class="pagination justify-content-end">
								{{ $settlements->links() }}
						</nav>


					</div>

	</div>
@endsection
