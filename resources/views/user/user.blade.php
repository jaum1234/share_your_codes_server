@extends('layouts.main')

@section('conteudo')

        <div class="col perfil">
            <div class="perfil__bloco rounded d-flex flex-column text-center p-3 ">
                <i class="fas fa-user-circle fs-1 profile mb-4"></i>
                <div>

                    <!--Form para alterar informacoes de perfil-->
                    <form action="/usuarios/{{ $user->id }}/editar" method="POST" name="formUpdateUser">
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

                                <div class="alert alert-success mt-3 d-none" data-message-box>
                                    
                                </div>
                        </li>
                        <div>
                            <button type="button" class="btn btn-primary" id="botao-editar" data-botao-editar>
                                <i class="fas fa-user-edit"></i>
                            </button>

                            <!--Hidden Button para confirmar alteracoes-->
                            <button 
                                type="submit"
                                hidden 
                                class="btn btn-success" 
                                id="botao-confirmar"
                                name="botao-confirmar"
                                data-botao-confirmar>
                                
                                <i class="fas fa-check-square"></i>
                            </button>
                        </div>
                    </ul>
                </form>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $(function() {
                const UsuarioId = '{{ $user->id }}';
                $('form[name="formUpdateUser"]').on('submit', function (event) {  
                    event.preventDefault();
                    const UsuarioId = '{{ $user->id }}';
                    $.ajax({
                        type: "POST",
                        url: "/usuarios/" + UsuarioId + "/editar",
                        data: $(this).serialize(),
                        dataType: 'json',
                        success: function (response) {
                            if (response.success === true) {
                                const messageBox = $('[data-message-box]'); 
                                messageBox.removeClass('d-none').html(response.message);
                                setTimeout(() => {
                                    messageBox.addClass('d-none');
                                }, 5000);
                                return;
                            }
                        }
                    });
                })
            })
        </script>
        
@endsection