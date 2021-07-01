@extends('layouts.main')

@section('conteudo')

        <div class="col bloco-perfil-usuario">
            <div class="user-background rounded d-flex flex-column text-center p-3 ">
                <i class="fas fa-user-circle fs-1 profile mb-4"></i>
                <div>

                    <!--Form para alterar informacoes de perfil-->
                    <form action="/usuarios/{{ $user->id }}/editar" method="POST">
                        @csrf

                    <ul class="list-unstyled fw-light d-flex flex-column lh-lg">
                        <li class="d-flex flex-column align-items-center mb-4">
                            E-mail:
                            <div>{{ $user->email }}</div>
                        </li>
                        <li class="d-flex flex-column align-items-center mb-4">
                            <label for="name">Nome completo:</label>
                            <p id="nome-completo">{{ $user->name }}</p>


                            <!--Hidden Input para alteracao do nome completo-->
                            <input 
                                id="input-nome-completo" 
                                hidden 
                                name="name" 
                                type="text" 
                                value="{{ $user->name }}" 
                                class="text-center rounded border-0">
                                <small class="text-danger">{{ $errors->first('name') }}</small>

                        </li>
                        <li class="d-flex flex-column align-items-center mb-4">
                            <label for="nickname">Nome de usuário:</label>
                            <p id="nome-usuario">{{ $user->nickname }}</p>

                            <!--Hidden Input para alteracao do nome de usuario-->
                            <input 
                                id="input-nome-usuario" 
                                hidden 
                                name="nickname" 
                                type="text" 
                                value="{{ $user->nickname }}" 
                                class="text-center rounded border-0">
                                <small class="text-danger">{{ $errors->first('nickname') }}</small>

                                @if (!empty($mensagem))

                                    <div class="alert alert-success mt-3">
                                        {{ $mensagem }}
                                    </div>

                                @endif

                        </li>
                        <div>
                            <button type="button" class="btn btn-primary" id="botao-editar">
                                <i class="fas fa-user-edit"></i>
                            </button>

                            <!--Hidden Button para confirmar alteracoes-->
                            <button 
                                hidden 
                                class="btn btn-success" 
                                id="botao-confirmar"
                                name="botao-confirmar">
                                
                                <i class="fas fa-check-square"></i>
                            </button>
                        </div>
                    </ul>
                </form>
                </div>
            </div>
        </div>
    

@endsection