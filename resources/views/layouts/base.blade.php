<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Productos</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet" type="text/css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{url('/')}}" style="font-weight: bold;">NombreEmpresa</a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
                                    <a style="color: white; font-weight: bold; background: black;" class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Salir
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="#" style="font-weight: bold;">
                  <span data-feather="home"></span>
                  Administrar <span class="sr-only">(current)</span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{url('products/')}}" style="font-weight: bold;">
                  <span data-feather="shopping-cart"></span>
                  Productos
                </a>
              </li>
                <li class="nav-item">
                <a class="nav-link" href="{{route('promotions.index')}}" style="font-weight: bold;">
                  <span data-feather="bar-chart-2"></span>
                  Promociones
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('categories')}}" style="font-weight: bold;">
                  <span data-feather="users"></span>
                  Categorias
                </a>
              </li>
  
            </ul>

          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <br>
            @yield('content')
        </main>
      </div>
    </div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>