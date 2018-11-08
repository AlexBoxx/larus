<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> {{ $title }} | Servis Panel</title>

    <!-- Scripts
    <script src="{{ asset('js/app.js') }}"></script>-->


    <!-- Styles-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('school/css/main.min.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">

      <!-- preload -->
      	<div id="loader-wrapper"><div class="loader">
      			<div class="line"></div><div class="line"></div><div class="line"></div><div class="line"></div><div class="line"></div><div class="line"></div>
      			<div class="subline"></div><div class="subline"></div><div class="subline"></div><div class="subline"></div><div class="subline"></div>
      			<div class="loader-circle-1"><div class="loader-circle-2"></div></div>
      			<div class="needle"></div><div class="loading">Загрузка...</div>
      		</div></div>
      	<!-- end preload -->

      	<!-- nav -->
      	<button class="c-hamburger c-hamburger--htx">
      		<span>toggle menu</span>
      	</button>
      	<div class="bg-nav">

      		<div class="container index">
      			<div class="row index align-items-center">

      				<div class="container-fluid">
      					<div class="row justify-content-center">

                  <a href="{{ route('admin.index')}}" >
                  <div class="card">
      							<div class="card-body">

      									<div class="icono"> <i class="ion-ios-albums-outline"></i> </div> <p>Панель</p>

      							</div>
      						</div>
                  </a>

                  <a href="{{ route('admin.country.index') }}">
                  <div class="card">
      							<div class="card-body">

      									<div class="icono"> <i class="ion-a-pin"></i> </div> <p>Страны</p>

      							</div>
      						</div>
                  </a>

                  <a href="{{ route('admin.category.index') }}">
                  <div class="card">
      							<div class="card-body">

      									<div class="icono"> <i class="ion-ios-copy-outline"></i> </div> <p>Новости</p>

      							</div>
      						</div>
                  </a>

                  <a href="{{ route('admin.user_managment.role.index') }}">
                  <div class="card">
      							<div class="card-body">

      									<div class="icono"> <i class="ion-ios-people-outline"></i> </div> <p> Участники</p>

      							</div>
      						</div>
                  </a>

                  <a href="#">
                    <div class="card">
      							<div class="card-body">

      									<div class="icono"> <i class="ion-easel"></i> </div> <p>Уроки</p>

      							</div>
      						</div>
                  </a>

                  <a href="#">
                    <div class="card">
      							<div class="card-body">

      									<div class="icono"> <i class="ion-ios-help-outline"></i> </div> <p>Вопросы</p>

      							</div>
      						</div>
                  </a>


                  <a href="#">
      						<div class="card">
      							<div class="card-body">

      									<div class="icono"> <i class="icon ion-ios-cog-outline"></i>  </div> <p>Настройки</p>

      							</div>
      						</div>
                  </a>

                  <div class="card">
      							<div class="card-body">

                      <p style="font-size: 0.7em; margin: 0.5em;">  {{ Auth::user()->name }}</p>

      								<a href="#" title="Редактировать"> <i class="icons ion-a-settings"></i>	</a>  <a href="{{ route('logout') }}" title="Выйти из аккаунта"> <i class="icons ion-log-out right"></i>	</a>

      									<div class="icono images" style="background-image: url(https://i.pinimg.com/736x/5b/5e/8c/5b5e8c2595a66e56e4a9ab21f64c4cd5--beard-art-beard-styles.jpg);">  </div>



      							</div>
      						</div>



      					</div>
      				</div>

      			</div>
      		</div>

      	</div>


        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <!--Scripts-->
    <!-- MainScripts-->
    <script src="{{ asset('school/js/scripts.min.js') }}"></script>
    <script type="text/javascript">

    $(function(){

      $('.bg-nav a').click(function(){
        $('.bg-nav').css({ 'transition': '3000s' });
        window.location($(this).attr('href'));
      });

      // для выборки стран и регионов в них
      $('#form-settlementser input:radio[name="country_id"]').on('change', function () {
        var valInput = $(this).val();

        $('#form-settlementser option').hide();
        $('#form-settlementser option.'+valInput).fadeIn();
      });

    });

    </script>




</body>
</html>
