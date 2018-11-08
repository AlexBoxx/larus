@extends('admin.layouts.app_admin')

@section('content')
 <div class="container align-items-center" >
 	<div class="row justify-content-center" >

    <div class="card col-sm-4">
      <div class="card-body">
        <h4 class="h4 mt-1 mb-2 text-center"><a href="{{ route('admin.user_managment.role.index') }}"><i class="ion-ios-people-outline"></i>  участники</a></h4>

        <table class="table td2 table-hover">
          <tbody>
            <tr>
              <td><a href="#" title="Список и редактирование"> ServisAdmin  </a></td>
              <td>5</td>
              <td><a href="#" class="text-success" title="Добавить нового"> <i class="ion-ios-plus-outline" style="font-size: 1.5em; line-height: 0; padding: 0;"></i></a></td>
            </tr>

            <tr>
              <td><a href="#" title="Список и редактирование"> Обучение </a></td>
              <td>5250897</td>
              <td><a href="#" class="text-success" title="Добавить нового"> <i class="ion-ios-plus-outline" style="font-size: 1.5em; line-height: 0; padding: 0;"></i></a></td>
            </tr>

            <tr>
              <td><a href="#" title="Список и редактирование"> Автошколы </a></td>
              <td>456</td>
              <td><a href="#" class="text-success" title="Добавить новую"> <i class="ion-ios-plus-outline" style="font-size: 1.5em; line-height: 0; padding: 0;"></i></a></td>
            </tr>

            <tr>
              <td><a href="#" title="Список и редактирование"> Инструктора </a></td>
              <td>1673</td>
              <td><a href="#" class="text-success" title="Добавить нового"> <i class="ion-ios-plus-outline" style="font-size: 1.5em; line-height: 0; padding: 0;"></i></a></td>
            </tr>

            <tr>
              <td><a href="#" title="Список и редактирование"> Заявки </a></td>
              <td>256</td>
              <td><a href="#" class="text-success" title="Добавить нового"> <i class="ion-ios-plus-outline" style="font-size: 1.5em; line-height: 0; padding: 0;"></i></a></td>
            </tr>

          </tbody>
        </table>

      </div>
    </div>

    <div class="card col-sm-4">
      <div class="card-body">
          <h4 class="h4 mt-1 mb-2 text-center"><i class="ion-ios-copy-outline"></i> Новости</h4>

        <table class="table table-sm table-hover">
          <tbody>
            <tr>
              <td><a href="{{ route('admin.category.index') }}" title="Список и редактирование"> Разделы  </a></td>
              <td>{{$count_cat}}</td>
              <td><a href="{{ route('admin.category.create') }}" class="text-success" title="Добавить новую"> <i class="ion-ios-plus-outline" style="font-size: 1.5em; line-height: 0; padding: 0;"></i></a></td>
            </tr>

            <tr>
              <td><a href="{{ route('admin.article.index') }}" title="Список и редактирование"> Статьи  </a></td>
              <td>{{$count_art}}</td>
              <td><a href="{{ route('admin.article.create') }}" class="text-success" title="Добавить новую"> <i class="ion-ios-plus-outline" style="font-size: 1.5em; line-height: 0; padding: 0;"></i></a></td>
            </tr>

          </tbody>
        </table>

      </div>
    </div>
 	</div>

 </div>
@endsection
