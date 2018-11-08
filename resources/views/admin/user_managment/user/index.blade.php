@extends('admin.layouts.app_admin')

@section('content')
	<div class="container">

		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{route('admin.index')}}"> Панель </a></li>
			<li class="breadcrumb-item"><a href="{{route('admin.user_managment.role.index')}}"> По ролям </a></li>
			<li class="breadcrumb-item active">{{$title}}</li>
		</ol>


		<a href="{{route('admin.user_managment.user.create')}}" class="btn btn-success pull-right"> <i class="fa fa-plus-square-o"></i> Добавить нового</a>

		<table class="table table-stripped">

			<thead>
				<th>NikName</th>
				<th>Email</th>
				<th class="text-right">Действие</th>
			</thead>

			<tbody>

				@forelse($users as $user)

				<tr>
					<td>{{$user->name}}</td> <td>{{$user->email}}</td>
					<td class="text-right">
						<form onsubmit="if(confirm('Удалить?')){ return true }else{ return false }" action="{{route('admin.user_managment.user.destroy', $user)}}" method="post">
							{{ method_field('DELETE')}}
							{{ csrf_field() }}

							<a href="{{route('admin.user_managment.user.edit', $user)}}" class="btn btn-primary" title="Редактировать"> <i class="fa fa-edit"></i> </a>

							<button type="submit" class="btn btn-danger" title="Удалить"> <i class="fa fa-trash-o"></i></button>

						</form>

					</td>
				</tr>

				@empty

				<tr>
					<td colspan="3" class="text-center"> <h2>Данные не получены.</h2> </td>
				</tr>

				@endforelse

				<tfoot>
					<tr>
						<!--StrNav Articles -->
						<td colspan="3">
							<nav aria-label="Page navigation example" class="pagination justify-content-end">
									{{ $users->links() }}
							</nav>
						</td>
					</tr>

				</tfoot>


			</tbody>


		</table>


	</div>
@endsection
