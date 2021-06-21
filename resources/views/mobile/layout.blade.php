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
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/botao.css">
    <link rel="stylesheet" href="/css/cabecalho.css">
    <link rel="stylesheet" href="/css/editor.css">
    <link rel="stylesheet" href="/css/form.css">
    <link rel="stylesheet" href="/css/menu.css">
    <link rel="stylesheet" href="/css/seletor-cor.css">
  
</head>
<body class="corpo">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent ">
            <div class="container-fluid">
                <a class="navbar-brand text-uppercase fs-3" href="#">
                  <span class="text-light">Alura</span>
                  <span id="dev" class="ms-1 rounded ps-1 pe-1">dev</span>
                </a>
                <input 
                  placeholder="busque aqui..." 
                  type="text" 
                  class="d-none rounded form-control ms-5 text-light fw-light" 
                  id="buscador">

              <div class="d-flex align-items-center">
                            <!-- Button trigger modal -->
                <button 
                  type="button" 
                  class="btn text-light" 
                  data-bs-toggle="modal" 
                  data-bs-target="#exampleModal" 
                  id="lupa">
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
                        <form action="/pesquisar" method="POST">
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
            
                              <!--Lado direito navbar no mobile e tablet-->

              <div class="collapse navbar-collapse fw-light justify-content-end" id="navbarNavAltMarkup" >
                <div class="navbar-nav" >
                  
                  <div class="dropdown">
                    <button 
                      class="btn btn-secondary d-flex align-items-center" 
                      type="button" 
                      id="dropdownMenuButton1" 
                      data-bs-toggle="dropdown" 
                      aria-expanded="false">
                      <i class="fas fa-user-circle fs-3 profile text-center"></i>
                      <span class="ms-3">{{ Auth::user()->nickname }}</span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      <li><a class="dropdown-item" href="/meusProjetos">Meus projetos</a></li>
                      <li><a class="dropdown-item" href="/user/{{ Auth::user()->nickname }}">Meu Perfil</a></li>
                      <div class="dropdown-divider bg-light"></div>
                      <li>
                        @auth
                        <a class="nav-link text-danger" href="/logout">Logout</a>  
                      @endauth
    
                      @guest
                        <a class="nav-link" href="/login">Login</a>
                      @endguest
                    </li>
                    </ul>

                                    <!--Lado direito navbar no desktop-->
                  </div>

                  <a class="nav-link active text-light" aria-current="page" href="/" id="ham">Home</a>
                  <a class="nav-link text-light" href="/editorDeCodigo" id="ham">Editor de codigo</a>
                  <a class="nav-link text-light" href="/comunidade" id="ham">Comunidade</a>
                  <a class="nav-link text-light" href="/meusProjetos" id="ham">Meus projetos</a>
                  <a class="nav-link text-light" href="/user/{{ Auth::user()->nickname }}" id="ham">Meu Perfil</a>
                  <div class="dropdown-divider bg-light"></div>

                  @auth
                    <a class="nav-link text-light" href="/logout" id="ham">Logout</a>  
                  @endauth

                  @guest
                    <a class="nav-link text-light" href="/login" id="ham">Login</a>
                  @endguest

                </div>
                
              </div>
            </div>
          </nav>
          @yield('conteudo')
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
    <script src="/js/compartilhar.js"></script>
    <script src="/js/borda-editor.js"></script>
    <script src="/js/contador-de-caracteres.js"></script>
    <script src="/js/editar-perfil.js"></script>
    <script src="/js/highlight.js"></script>
    <script src="/js/salvar-na-textarea.js"></script>
    <script src="/js/color-picker.js"></script>
    <script>
      $(function() {  
        $('#dev').css({'color' : '#051D3B', 'background-color' : 'white'})
        
        exibeFormularioEdicao();
      })
    </script>
</body>
</html>