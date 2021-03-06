@extends('admin.layouts.app_admin')

@section('content')

	<div class="container">

		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{route('admin.index')}}"> Панель </a></li>
			<li class="breadcrumb-item"><a href="{{route('admin.category.index')}}"> Разделы</a></li>
			<li class="breadcrumb-item active">{{$title}}</li>
		</ol>


		<form class="form-horizontal" action="{{route('admin.category.update', $category)}}" method="post">
        {{ method_field('PUT')}}
			{{ csrf_field() }}

			<!-- Form -include-->
			@include('admin.categories.partials.form')

		</form>



	</div>

@endsection
