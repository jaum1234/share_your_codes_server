@extends('layouts.main')

@section('conteudo')
    
    
    <div class="col d-flex conteudo-principal mb-4">
        <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="#exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-header alert alert-success">
                    <h5 class="modal-title me-5 pe-5 " id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>   
            </div>
        </div>
        <form name="formSaveProject" action="/projetos" method="POST" class="conteudo-principal__form" data-conteudo-principal-form>
            @csrf
            
            <div class="col-10 d-flex flex-column conteudo-principal__editor">
                <div style="width: 100%">
                    <div class="code editor fw-light text-light mt-3 rounded p-3" hidden data-codigo-highlight>
                
                    </div>
                
                    <textarea
                        class="editor p-3 fw-light text-light mt-3 rounded"
                        id="editor"
                        name="codigo"
                        data-editor-codigo>Escreva seu codigo aqui...</textarea>
                
                
                    <small class="text-danger error__text codigo__error"></small>
                    <p class="fw-light text-center mt-2"><span id="contator-caracteres">0</span> caracteres</p>
                </div>
                <button
                    name="botao-highlight"
                    type="button"
                    id="botao-highlight"
                    class="btn btn-primary botao-highlight botao-highlight--com-highlight p-3 fw-light rounded text-center"
                    style="cursor: pointer"
                    data-botao-highlight>
                    Visualizar projeto com highlight
                </button>
                <button
                    name="botao-sem-highlight"
                    type="button"
                    id="botao-sem-highlight"
                    class="btn btn-primary botao-highlight botao-highlight--sem-highlight p-3 fw-light rounded text-center"
                    hidden
                    style="cursor: pointer">
                    Visualizar projeto sem highlight
                </button>
            
            </div>
            <div class="col-2 mt-5 conteudo-principal__info">
                <div class="text-start ">
                    <div class="d-flex flex-column mb-4">
                        <h5 class="fw-light">Seu projeto</h5>
                        <input type="text" name="nome" id="nome-projeto" placeholder="nome do projeto" class="rounded p-3 input-text fw-light form-control editor__titulo text-light">
                        <small class="text-danger error__text nome__error mb-3 mt-2"></small>
            
                        <textarea
                            maxlength="60"
                            name="descricao"
                            cols="23"
                            rows="2"
<<<<<<< HEAD
                            class="rounded p-3 input-text fw-light form-control editor__descricao text-light"
=======
                            class="rounded p-3 input-text fw-light hidden-overflow"
>>>>>>> 74623675326c79154dd712dbfc9b2623daf246c3
                            id="descricao-projeto"
                            placeholder="Descriçao do projeto">
                            
                        </textarea>
                        <small class="text-danger error__text descricao__error mt-2"></small>
                    </div>
                </div>
                <div class="d-flex flex-column">
                    <h5 class="fw-light">Personalização</h5>
                    <input 
                        type="color" 
                        name="cor" 
                        placeholder="Selecione uma cor..." 
                        readonly 
                        class="rounded mb-3 fw-light conteudo-principal__seletor-cor"
                        data-cor>
                    <button 
                        name="botao-salvar" 
                        class="p-3 rounded fw-light btn btn-primary" 
                        id="botao-salvar"
                        data-botao-salvar>
                        Salvar projeto
                    </button>  
                </div>
            </div>
        </form>
    </div>

@endsection
@push('scripts')
    <script src="{{ asset('js/whitespaces.js') }}"></script>
    <script type="module" src="{{ asset('/js/salvar-projeto.js') }}"></script>
    <script src="{{ asset('js/contador-de-caracteres.js') }}"></script>
    <script type="module" src="{{ asset('js/highlight.js') }}" ></script>
    <script src="{{ asset('/js/selecionar-cor-borda.js') }}"></script>
    <script>
        $(function() {  
            $('form[name="formSaveProject"]').on('submit', function (event) {  
                event.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "/projetos",
                    data: $(this).serialize(),
                    dataType: 'json',
                    beforeSend: function () {  
                        '{{ Auth::check() ? '' : redirect("/login") }}'
                    },
                    success: function (response) {
                        if (response.success === true) {
                            $('#successModal').modal('show');
                            $('#successModal h5').text(response.message);
                        } else {
                            $.each(response.message , function(chave, valor) {  
                                $('small.' + chave + '__error').text(valor);
                                setTimeout(function() {
                                    $('.error__text').text('');
                                }, 10000);
                            });
                        } 
                        return;
                    }
                });
            })
        })

        
    </script>
@endpush