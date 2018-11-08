@extends('admin.layouts.app_admin')

@section('content')

	<div class="container">

		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{route('admin.index')}}"> Панель </a></li>
			<li class="breadcrumb-item"><a href="{{route('admin.user_managment.role.index')}}"> Роли </a></li>
			<li class="breadcrumb-item active">{{$title}}</li>
		</ol>

		<hr/>
		<form class="form-horizontal" action="{{route('admin.user_managment.role.update', $role)}}" method="post">
        {{ method_field('PUT')}}
			{{ csrf_field() }}

			<!-- Form -include-->
			@include('admin.user_managment.role.partials.form')

		</form>



	</div>

@endsection
