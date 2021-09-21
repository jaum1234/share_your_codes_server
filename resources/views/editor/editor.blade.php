@extends('layouts.main')

@section('conteudo')
    
    
    <div class="col d-flex conteudo-principal mb-4">
        <form action="/projetos" method="POST" class="conteudo-principal__form" data-conteudo-principal-form>
            @csrf
            
            <div class="d-flex flex-column align-items-center conteudo-principal__editor">
                <div class="code editor fw-light text-light mt-3 rounded p-3 mb-1" hidden data-codigo-highlight>
                    
                </div>
            
                <textarea 
                    class="editor p-3 fw-light text-light mt-3 rounded" 
                    id="editor" 
                    name="codigo"
                    data-editor-codigo>Escreva seu codigo aqui...</textarea>
                
                
                <small class="text-danger">{{ $errors->first('codigo') }}</small>
                <p class="fw-light"><span id="contator-caracteres">0</span> caracteres</p>
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
            <div class="col mt-5 conteudo-principal__info">
                <div class="text-start ">
                    <div class="d-flex flex-column mb-4">
                        <h5 class="fw-light">Seu projeto</h5>
                        <input type="text" name="nome" id="nome-projeto" placeholder="nome do projeto" class="rounded p-3 input-text fw-light form-control editor__titulo text-light">
                        <small class="text-danger mb-3">{{ $errors->first('nome') }}</small>
            
                        <textarea
                            maxlength="60"
                            name="descricao"
                            cols="23"
                            rows="2"
                            class="rounded p-3 input-text fw-light form-control editor__descricao text-light"
                            id="descricao-projeto"
                            placeholder="Descriçao do projeto">
                            
                        </textarea>
                        <small class="text-danger">{{ $errors->first('descricao') }}</small>
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
    <script type="module" src="{{ asset('/js/salvar-projeto.js') }}"></script>
    <script src="{{ asset('js/contador-de-caracteres.js') }}"></script>
    <script type="module" src="{{ asset('js/highlight.js') }}" ></script>
    <script src="{{ asset('/js/selecionar-cor-borda.js') }}"></script>
@endpush