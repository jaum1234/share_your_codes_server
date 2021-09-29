<nav class="navbar navbar-expand-xl navbar-light bg-transparent nav">
    <div class="container-fluid ">
        <a class="navbar-brand text-light fs-2 fw-light" href="#">Aluradev</a>
        <form action="{{ route('pesquisar') }}" class="search">
            <input type="text" class="search__input form-control text-light fw-light">
        </form>
        <button class="navbar-toggler text-light border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-light fw-light" href="{{ route('projetos.criar') }}">Editor</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light fw-light" href="{{ route('projetos') }}">Comunidade</a>
                </li>
                @auth
                <li class="nav-item">
                    <a 
                        class="nav-link text-light fw-light" 
                        href="{{ route('usuarios.projetos', ['id' => Auth::user()->id, 'nick' => Auth::user()->nickname]) }}">
                        Meus Projetos
                    </a>
                </li>
                <li class="nav-item">
                    <a 
                        class="nav-link text-light fw-light" 
                        href="{{ route('usuarios.editar', ['id' => Auth::user()->id, 'nick' => Auth::user()->nickname]) }}">
                        Meu perfil
                    </a>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li class="nav-item">
                    <a class="nav-link text-danger fw-bold" href="{{ route('logout') }}">Logout</a>
                </li>
                @endauth
                @guest
                <li class="nav-item">
                    <a class="nav-link text-primary fw-bold" href="{{ route('form.login') }}">Login</a>
                </li>
                @endguest
            </ul>
      </div>
    </div>
  </nav>