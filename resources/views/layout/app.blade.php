<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gasunie</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!--Bootstrap-->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}"></script>

        <!-- Eigen CSS -->
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" type="text/css" >
        <script src="{{ asset('js/custom.js') }}"></script>
        </head>

    <body>
    <nav class="navbar navbar-expand-md navbar-light bg-gu">
        <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ url('/image/gasunie2.png') }}" height="55" width="100"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Dagjournaal
    </a>
    <div class="dropdown-menu drop-bg" aria-labelledby="navbarDropdownMenuLink">
      <a class="dropdown-item" href="{{ url('archief/create') }}">Invullen</a>
      <a class="dropdown-item" href="{{ url('archief') }}">Archief</a>
      <a class="dropdown-item" href="{{ url('dagelijks') }}">Dagelijkse<br/> bezigheden</a>
      <a class="dropdown-item" href="{{ url('aanwezigen') }}">Aanwezigen</a>
    </div>
      <li class="nav-item">
      <li class="nav-item">
        <a class="nav-link" href="{{ url('cameratoezicht') }}">Cameratoezicht</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('links') }}">Links</a>
      </li>
    </ul>
  </div>
</nav>
<hr>

  <div class="container">    
        
        @yield('content')

  </div>

  <br/>

    </body>
</html>