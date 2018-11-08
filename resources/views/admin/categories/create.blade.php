@extends('admin.layouts.app_admin')

@section('content')

	<div class="container">

		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{route('admin.index')}}"> Панель </a></li>
			<li class="breadcrumb-item"><a href="{{route('admin.category.index')}}"> Разделы</a></li>
			<li class="breadcrumb-item active">{{$title}}</li>
		</ol>

		<hr/>
		<form class="form-horizontal" action="{{route('admin.category.store')}}" method="post">
			{{ csrf_field() }}

			<!-- Form -include-->
			@include('admin.categories.partials.form')

		</form>



	</div>

@endsection
