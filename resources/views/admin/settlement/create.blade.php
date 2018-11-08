@extends('admin.layouts.app_admin')

@section('content')

	<div class="container">

    <ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{route('admin.index')}}"> Панель </a></li>
      <li class="breadcrumb-item"><a href="{{route('admin.country.index')}}"> Страны </a></li>
			@isset($country)
				<li class="breadcrumb-item"><a href="{{route('admin.countryRegion', $country)}}"> {{ $country->title }} </a></li>
			@endisset

			@isset($region)
				<li class="breadcrumb-item"><a href="{{route('admin.regionSettlement', $region)}}"> {{ $region->title }} </a></li>
			@endisset

			<li class="breadcrumb-item active">{{$title}}</li>
		</ol>

		<form class="form-horizontal" id="form-settlementser" action="{{route('admin.settlement.store')}}" method="post">
			{{ csrf_field() }}

			<!-- Form -include-->
			@include('admin.settlement.partials.form')

		</form>




	</div>

@endsection
