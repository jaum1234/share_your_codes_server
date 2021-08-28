<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

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
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent ">
            <div class="container-fluid">
                <a class="navbar-brand text-uppercase fs-3" href="/">
                  <span class="text-light">Alura</span>
                  <span class="ms-1 rounded ps-1 pe-1" data-dev>dev</span>
                </a>
                <form action="/projetos?q=" method="GET" class="nav__form">
                  @csrf
                  <input
                    placeholder="busque aqui..."
                    name="q"
                    class="rounded form-control ms-5 text-light fw-light nav__buscador"
                  >
                </form>


              <div class="d-flex align-items-center">
                            <!-- Button trigger modal -->
                <button 
                  type="button" 
                  class="btn text-light nav__lupa" 
                  data-bs-toggle="modal" 
                  data-bs-target="#exampleModal" 
                  >
                    <i class="fas fa-search fs-4"></i> 
                </button>
                
                <!-- Modal -->
                <div 
                  class="modal fade" 
                  id="exampleModal" tabindex="-1" 
                  aria-labelledby="exampleModalLabel" 
                  aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title text-dark" id="exampleModalLabel">Busque aqui...</h5>
                        <button 
                          type="button" 
                          class="btn-close" 
                          data-bs-dismiss="modal" 
                          aria-label="Close">
                        </button>
                        </div>
                        <form action="/projetos?q=" method="POST" class="nav__form--modal">
                            @csrf
                        <div class="modal-body">
                            <input type="text" class="rounded form-control" name="criterio">
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button class="btn btn-primary">Buscar</button>
                        </div>
                        </form>
                    </div>
                    </div>
                </div>
              <button 
                class="navbar-toggler bg-light ms-2" 
                type="button" data-bs-toggle="collapse" 
                data-bs-target="#navbarNavAltMarkup" 
                aria-controls="navbarNavAltMarkup" 
                aria-expanded="false" 
                aria-label="Toggle navigation"
                >
                <span class="navbar-toggler-icon" ></span>
              </button>
            </div>
            
                              <!--Lado direito navbar no destop-->

              <div class="collapse navbar-collapse fw-light justify-content-end" id="navbarNavAltMarkup" >
                <div class="navbar-nav" >
                  
                  <div class="dropdown nav__dropdown">
                    <button 
                      class="btn text-light fw-light d-flex align-items-center" 
                      type="button" 
                      id="dropdownMenuButton1" 
                      data-bs-toggle="dropdown" 
                      aria-expanded="false">
                      <i class="fas fa-user-circle fs-3 profile text-center"></i>
                      <span class="ms-3">{{ Auth::user()->nickname }}</span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      <li><a class="dropdown-item" href="/usuarios/{{ Auth::user()->id }}/{{ Auth::user()->nickname }}/projetos">Meus projetos</a></li>
                      <li><a class="dropdown-item" href="/usuarios/{{ Auth::user()->id }}/{{ Auth::user()->nickname }}">Meu Perfil</a></li>
                      <div class="dropdown-divider bg-light"></div>
                      <li>
                        @auth
                          <a class="dropdown-item text-danger" href="/logout">Logout</a>  
                        @endauth
    
                        @guest
                          <a class="dropdown-item" href="/login">Login</a>
                        @endguest
                    </li>
                    </ul>

                  </div>
                  
                                <!--Lado direito navbar no mobile e tablet-->
                  <a class="nav-link active text-light" aria-current="page" href="/" >Home</a>
                  <a class="nav-link text-light" href="/projetos/criar" >Editor de codigo</a>
                  <a class="nav-link text-light" href="/projetos" >Comunidade</a>
                  <a class="nav-link text-light" href="/usuarios/{{ Auth::user()->id }}/{{ Auth::user()->nickname }}/projetos" >Meus projetos</a>
                  <a class="nav-link text-light" href="/usuarios/{{ Auth::user()->id }}/{{ Auth::user()->nickname }}" >Meu Perfil</a>
                  <div class="dropdown-divider bg-light"></div>

                  @auth
                    <a class="nav-link text-light" href="/logout" >Logout</a>  
                  @endauth

                  @guest
                    <a class="nav-link text-light" href="/login" >Login</a>
                  @endguest

                </div>
                
              </div>
            </div>
          </nav>
          <div class="container mt-5">
            <div class="row">
              <div class="col sidebar">
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
              </div>
              @yield('conteudo')
            </div>
          </div>
    </div>

    <!--Bibliotecas JS-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/b763dd609a.js" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.0.1/highlight.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.0.1/highlight.min.js"></script>

    <!--Meus scripts-->
    <script type="module" src="/js/compartilhar.js"></script>
    <script src="/js/contador-de-caracteres.js"></script>
    <script src="/js/editar-perfil.js"></script>
    <script type="module" src="/js/sem-highlight.js" ></script>
    <script type="module" src="/js/salvar-projeto.js"></script>
    <script src="/js/selecionar-cor-borda.js"></script>
    <script src="/js/com-highlight.js" ></script>
    <script>
      $(function() { 
        $('[data-dev]').css({'color' : '#051D3B', 'background-color' : 'white'})     
        
      })
    </script>
</body>
</html>