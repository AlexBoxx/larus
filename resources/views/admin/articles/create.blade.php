@extends('admin.layouts.app_admin')

@section('content')

	<div class="container">

		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{route('admin.index')}}"> Панель </a></li>
			<li class="breadcrumb-item"><a href="{{route('admin.category.index')}}"> Разделы  </a></li>
			<li class="breadcrumb-item"><a href="{{route('admin.article.index')}}"> Статьи </a></li>
			<li class="breadcrumb-item active">{{$title}}</li>
		</ol>

		<form class="form-horizontal" action="{{route('admin.article.store')}}" method="post">
			{{ csrf_field() }}



			<!-- Form -include-->
			@include('admin.articles.partials.form')

      <input type="hidden" name="created_by" value="{{Auth::id()}}">


		</form>

		<script src="{{ asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
		<script>
        CKEDITOR.replace( 'text' );
				CKEDITOR.replace( 'description' );
    </script>


	</div>

@endsection
