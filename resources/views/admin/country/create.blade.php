@extends('admin.layouts.app_admin')

@section('content')

	<div class="container">

    <ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{route('admin.index')}}"> Панель </a></li>
      <li class="breadcrumb-item"><a href="{{route('admin.country.index')}}"> Страны </a></li>
			<li class="breadcrumb-item active">{{$title}}</li>
		</ol>

		<form class="form-horizontal" action="{{route('admin.country.store')}}" method="post">
			{{ csrf_field() }}

			<!-- Form -include-->
			@include('admin.country.partials.form')

      <input type="hidden" name="created_by" value="{{Auth::id()}}">


		</form>


	</div>

@endsection
