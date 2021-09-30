<nav class="navbar navbar-expand-xl navbar-light bg-transparent nav">
    <div class="container-fluid">
        <h1 class="navbar-brand text-light nav__logo fs-3 align-self-center">Alura<span class="nav__logo--dev px-1 ms-2">dev</span></h1>
        <div class="d-flex align-items-center">
            <x-modal.search/>
            <button class="navbar-toggler text-light border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
        </div>
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