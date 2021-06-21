@extends('mobile.layout')

@section('conteudo')
    <div class="container mt-5">
        <div class="row">
            <div class="col d-none" id="primeira-coluna">
                <div>
                    <h5 class="fw-light">Menu</h5>
                    <div>
                        <ul class="list-unstyled fw-light">
                            <li class="mb-2">
                                <i class="fas fa-code fs-6 icone"></i>
                                <a href="/editorDeCodigo" class="text-decoration-none text-light">Editor de código</a>
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-users fs-6 icone"></i>
                                <a href="/comunidade" class="text-decoration-none text-light">Comunidade</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col d-flex flex-column user-background rounded " id="segunda-coluna">
                @if ($errors->all())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif
                
                <i class="fas fa-user-circle fs-1 profile mb-4 text-center"></i>
                <div>
            
                    <!--Form para alterar informacoes de perfil-->
                    <form action="/user/editarPerfil/{{ $user->id }}" method="POST">
                        @csrf
                    <ul class="list-unstyled fw-light d-flex flex-column lh-lg">
                        <li class="d-flex flex-column align-items-center mb-4">
                            E-mail:
                            <div>{{ $user->email }}</div>
                        </li>
                        <li class="d-flex flex-column align-items-center mb-4">
                            <label for="nomeCompleto">Nome completo:</label>
                            <span id="nome-completo">{{ $user->name }}</span>
                            <!--Hidden Input para alteracao do nome completo-->
                            <input
                                id="input-nome-completo"
                                hidden
                                name="nomeCompleto"
                                type="text"
                                value="{{ $user->name }}"
                                class="text-center rounded form-control">
                        </li>
                        <li class="d-flex flex-column align-items-center mb-4">
                            <label for="nomeUsuario">Nome de usuário:</label>
                            <span id="nome-usuario">{{ $user->nickname }}</span>
                            <!--Hidden Input para alteracao do nome de usuario-->
                            <input
                                id="input-nome-usuario"
                                hidden
                                name="nomeUsuario"
                                type="text"
                                value="{{ $user->nickname }}"
                                class="text-center rounded form-control">
                        </li>
                        <div class="text-center">
                            <span class="btn btn-primary" id="botao-editar">
                                <i class="fas fa-user-edit"></i>
                            </span>
            
                            <!--Hidden Button para confirmar alteracoes-->
                            <button hidden class="btn btn-success" id="botao-confirmar">
                                <i class="fas fa-check-square"></i>
                            </button>
            
                        </div>
                    </ul>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection