<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@300;400;700&display=swap" rel="stylesheet">

    <!--Bibliotecas CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet"
    href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.0.1/styles/default.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.0.3/styles/vs2015.min.css">

    <!--Meus estilos-->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  
</head>
<body>
  <div class="container">
    <div class="nav__mobile">
      <x-navbar.mobile/>
    </div>
    <div class="nav__tablet">
      <x-navbar.tablet/>
    </div>
    <div class="nav__desktop">
      <x-navbar.desktop/>
    </div>
    <div class="container mt-5">
      <div class="row">
        <sidebar class="col-2 sidebar">
          <div>
              <h5 class="mb-4 fw-light sidebar__titulo">Menu</h5>
              <div>
                  <ul class="list-unstyled fw-light">
                      <li class="mb-3 sidebar__item">
                          <a href="/projetos/criar" class="text-decoration-none text-light">
                            <i class="fas fa-code fs-6 sidebar__icone"></i>
                            Editor de código
                          </a>
                      </li>
                      <li class="mb-2 sidebar__item">
                          <a href="/projetos" class="text-decoration-none text-light">
                            <i class="fas fa-users fs-6 sidebar__icone"></i>
                            Comunidade
                          </a>
                      </li>
                  </ul>
              </div>
          </div>
        </sidebar>
        @yield('conteudo')
            
      </div>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/b763dd609a.js" crossorigin="anonymous"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.0.1/highlight.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.0.1/highlight.min.js"></script>

  @yield('js')
</body>
</html>