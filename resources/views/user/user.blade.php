@extends('layout')

@section('conteudo')
    <div class="col-9 position-relative">
        <div class="user-background rounded d-flex flex-column text-center p-3 ">
            <i class="fas fa-user-circle fs-1 profile mb-4"></i>
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
                        <input id="input-nome-completo" hidden name="nomeCompleto" type="text" value="{{ $user->name }}" class="text-center rounded border-0">

                    </li>
                    <li class="d-flex flex-column align-items-center mb-4">
                        <label for="nomeUsuario">Nome de usuário:</label>
                        <span id="nome-usuario">{{ $user->nickname }}</span>

                        <!--Hidden Input para alteracao do nome de usuario-->
                        <input id="input-nome-usuario" hidden name="nomeUsuario" type="text" value="{{ $user->nickname }}" class="text-center rounded border-0">

                    </li>
                    <div>
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

@endsection