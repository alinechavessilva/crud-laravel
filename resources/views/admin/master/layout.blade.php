<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRC - Almaviva</title>
    <link href="{{ url('/css/bootstrap.min.css') }}" rel="stylesheet" crossorigin="anonymous">
     <link rel="stylesheet" href="{{ url( mix('/admin/css/style.css') )}}">
</head>
<body>

<header>
    <nav class="navbar navbar-expand-lg navbar-light main-menu">
    <div class="container-fluid">
        <div class='menu-container'>
                <div class='header-top'>
                    <span>
                        <a class="navbar-brand" href="{{ route('home')}}">
                                <img alt='logo crc' src='/img/crc.png' align="center"/>
                        </a>
                    </span>

                    <div class='header-bottom'>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="{{ route('home')}}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link"href="#">Carteiras</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Pessoas</a>
                                </li>
                            </ul>
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Icone</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Icone2</a>
                                </li>
    
                            </ul>
                        </div>
                    </div>

                </div>
                
            </div>
    </div>
    </nav>
</header>

<div class="container" >
    <main class="main-content">
    @yield('content')
    </main>

</div>


<footer class="blog-footer" >
    <a href="#">
        <img alt='logo almaviva' src='/img/almaviva.png' />
    </a>
  </p>
</footer>

{{-- <script src="/js/bootstrap.min.js" ></script> --}}

<script src="{{ url('/js/bootstrap.bundle.min.js') }}" ></script>
<script src="{{ url('/js/jquery-3.6.0.min.js') }}" ></script>
<script src="{{ url('/js/jquery.mask.min.js') }}" ></script>
<script src="{{ url('/js/axios.min.js') }}"></script>

<script src="{{ url( mix('admin/js/script.js') )}}"></script>


</body>
</html>
