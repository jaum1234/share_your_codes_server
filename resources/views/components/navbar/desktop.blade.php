<nav class="navbar navbar-expand-xl navbar-light bg-transparent nav">
    <div class="container-fluid d-flex align-items-center">
        <h1 class="navbar-brand text-light nav__logo fs-3 align-self-center">
            <img width="135px" src="{{ asset('img/logo.png') }}" alt="logo do site">
        </h1>
        <form action="{{ route('pesquisar') }}" class="search">
            <input name="q" type="text" class="search__input form-control text-light fw-light" placeholder="Busque aqui...">
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
                        href="{{ route('users.projetos', ['id' => Auth::user()->id, 'nick' => Auth::user()->nickname]) }}">
                        Meus projetos
                    </a>
                </li>
                <li>
                    <a 
                        class="dropdown-item" 
                        href="{{ route('users.edit', ['id' => Auth::user()->id, 'nick' => Auth::user()->nickname]) }}">
                        Meu perfil
                    </a>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <a 
                        class="dropdown-item text-danger fw-bold" 
                        href="{{ route('login.destroy') }}">
                        Logout
                    </a>
                </li>
                @endauth
                @guest
                <li>
                    <a 
                        class="dropdown-item text-primary fw-bold" 
                        href="{{ route('login.create') }}">
                        Login
                    </a>
                </li>
                @endguest
            </ul>
          </div>
    </div>
</nav>