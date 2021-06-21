
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alura - Editor de Códigos</title>

    <!--Bibliotecas CSS-->
    <link rel="stylesheet"
    href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.0.1/styles/default.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.0.3/styles/vs2015.min.css">

    <!--Meus estilos-->
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/botao.css">
    <link rel="stylesheet" href="/css/cabecalho.css">
    <link rel="stylesheet" href="/css/editor.css">
    <link rel="stylesheet" href="/css/form.css">
    <link rel="stylesheet" href="/css/menu.css">
    <link rel="stylesheet" href="/css/seletor-cor.css">
  
<body class="corpo">
    
    <div class="container">
        <div class="d-flex flex-column pt-4">
            <nav class=" mb-5">
                <div class="row align-items-center justify-content-between">
                  <div class="col">
                    <img src="https://trello-attachments.s3.amazonaws.com/60acec8ee3a888422c8e2195/60acec8ee3a888422c8e21cc/443x161/2ba7394d365f6e785440587a57abe5f1/image.png" alt="..." class="logo">
                  </div>
                  <div class="col-6 text-center">
                    <div>
                      <form action="/pesquisar" method="POST" class="d-flex justify-content-center align-items-center">
                        <input type="text" placeholder="Busque aqui..." class="rounded p-3 me-3 input-text fw-light buscador" name="criterio">
                        <button class="lupa"><i class="fas fa-search fs-4"></i></button>
                        @csrf
                      </form>
                    </div>
                  </div>
                  <div class="col">
                    <div class="d-flex align-items-center justify-content-end">         
                        @auth
                        <div class="btn-group" id="menu-principal">
                          <button type="button" class="btn btn-info d-flex align-items-center">
                            <i class="fas fa-user-circle fs-3 profile me-2"></i>
                            <span>{{ Auth::user()->nickname }}</span>
                          </button>
                          <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/user/{{ Auth::user()->name }}">Meu Perfil</a></li>
                            <li><a class="dropdown-item" href="/meusProjetos">Meus Projetos</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="/logout">Logout</a></li>
                          </ul>
                        </div>

                        <div class="btn-group d-none" id="profile">
                          <button type="button" class="btn btn-info rounded" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-bars"></i>
                          </button>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/user/{{ Auth::user()->name }}">Meu Perfil</a></li>
                            <li><a class="dropdown-item" href="/meusProjetos">Meus Projetos</a></li>
                            <li><a class="dropdown-item" href="/editorDeCodigo">Editor de código</a></li>
                            <li><a class="dropdown-item" href="/comunidade">Comunidade</a></li>
                            <li><a class="dropdown-item" href="/meusProjetos">Meus projetos</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="/logout">Logout</a></li>
                          </ul>
                        </div>

                        @endauth

                        @guest    
                        <a href="/login" class="text-decoration-none fs-3 profile">
                          <i class="fas fa-user-circle"></i>
                          <span class="fw-light">Login</span>
                        </a>    
                        @endguest
                    </div>
                  </div>
                </div>
            </nav>
            <main>
              <div class="row" id="caixa-principal">
                <div class="col menu">             
                        <div class="d-flex flex-column text-start" id="menu-lateral">
                          <h5 class="fw-light">Menu</h5>
                              <div>
                                  <div class="mb-2 mt-1">
                                      <a href="/editorDeCodigo" class="text-decoration-none d-flex align-items-center item">
                                          <i class="fas fa-code icone"></i>
                                          <span class="fw-light">Editor de código</span>
                                      </a>
                                  </div>
                                  <div class="mb-2">
                                      <a href="/comunidade" class="text-decoration-none d-flex align-items-center item">
                                          <i class="fas fa-users icone"></i>
                                          <span class="fw-light">Comunidade</span>
                                      </a>
                                  </div>
                                  <div>
                                      <a href="/meusProjetos" class="text-decoration-none  d-flex align-items-center item">
                                          <i class="fas fa-user icone"></i>
                                          <span class="fw-light">Meus projetos</span>
                                      </a>
                                  </div>
                              </div>
                        </div> 
                </div>
                @yield('conteudo')
              </div>
            </main>
            
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/b763dd609a.js" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.0.1/highlight.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.0.1/highlight.min.js"></script>

    <script src="/js/compartilhar.js"></script>
    <script src="/js/borda-editor.js"></script>
    <script src="/js/contador-de-caracteres.js"></script>
    <script src="/js/editar-perfil.js"></script>
    <script src="/js/highlight.js"></script>
    <script src="/js/salvar-na-textarea.js"></script>
    <script src="/js/color-picker.js"></script>
    <script>
      $(function() {  



        exibeFormularioEdicao();
      })
    </script>
</body>
</html>