@extends('admin.layouts.app_admin')

@section('content')

	<div class="container">

    <ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{route('admin.index')}}"> Панель </a></li>
      <li class="breadcrumb-item"><a href="{{route('admin.country.index')}}"> Страны </a></li>
			<li class="breadcrumb-item"><a href="{{route('admin.countryRegion', $country)}}"> {{ $country->title }} </a></li>
			<li class="breadcrumb-item active">{{$title}}</li>
		</ol>

		<form class="form-horizontal" action="{{route('admin.region.store')}}" method="post">
			{{ csrf_field() }}

			<!-- Form -include-->
			@include('admin.region.partials.form')

		</form>


	</div>

@endsection
