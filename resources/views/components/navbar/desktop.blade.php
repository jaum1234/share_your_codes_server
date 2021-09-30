<nav class="navbar navbar-expand-xl navbar-light bg-transparent nav">
    <div class="container-fluid d-flex align-items-center">
        <h1 class="navbar-brand text-light nav__logo fs-3">Alura<span class="nav__logo--dev px-1 ms-2">dev</span></h1>
        <form action="{{ route('pesquisar') }}" class="search">
            <input type="text" class="search__input form-control text-light fw-light" placeholder="Busque aqui...">
        </form>
        <div class="btn-group">
            <button type="button" class="btn text-light" data-bs-toggle="dropdown" aria-expanded="false">
                @auth
                <span class="me-2 fw-light">{{ Auth::user()->nickname }}</span>
                <i class="fas fa-user"></i>
                @endauth
                @guest
                <span class="me-2 fw-light">Guest</span>
                <i class="fas fa-user"></i>  
                @endguest
            </button>
            <ul class="dropdown-menu">
                @auth
                <li>
                    <a 
                        class="dropdown-item" 
                        href="{{ route('usuarios.projetos', ['id' => Auth::user()->id, 'nick' => Auth::user()->nickname]) }}">
                        Meus projetos
                    </a>
                </li>
                <li>
                    <a 
                        class="dropdown-item" 
                        href="{{ route('usuarios.editar', ['id' => Auth::user()->id, 'nick' => Auth::user()->nickname]) }}">
                        Meu perfil
                    </a>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <a 
                        class="dropdown-item text-danger fw-bold" 
                        href="{{ route('logout') }}">
                        Logout
                    </a>
                </li>
                @endauth
                @guest
                <li>
                    <a 
                        class="dropdown-item text-primary fw-bold" 
                        href="{{ route('form.login') }}">
                        Login
                    </a>
                </li>
                @endguest
            </ul>
          </div>
    </div>
  </nav>