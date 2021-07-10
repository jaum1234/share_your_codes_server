@extends('layouts.main')

@section('conteudo')
    
    
    <div class="col d-flex flex-column" id="conteudo-principal">
        
        
      
        <div class="col" id="segunda-coluna">
            

            <form action="/projetos" method="POST">
                @csrf
            <pre class="editor editor-normal p-3 fw-light text-light mt-3 rounded" id="editor-pre"><code contenteditable="true" id="editor">Escreva seu codigo aqui...</code></pre>
                            
            <textarea 
                name="codigo" 
                id="editor-hidden" 
                hidden>
            </textarea>
            <small class="text-danger">{{ $errors->first('codigo') }}</small>


            <div class="d-flex flex-column align-items-center">
                <p class="fw-light"><span id="contator-caracteres">0</span> caracteres</p>
                
                    <span
                        name="botao-highlight"
                        id="botao-highlight"
                        class="botao-highlight p-3 fw-light rounded text-center"
                        style="cursor: pointer">
                        Visualizar projeto com highlight
                    </span>
                    <span
                        name="botao-sem-highlight"
                        id="botao-sem-highlight"
                        class="botao-highlight p-3 fw-light rounded text-center"
                        hidden
                        style="cursor: pointer">
                        Visualizar projeto sem highlight
                    </span>
                
            </div>
        </div>
        <div class="col mt-5" id="terceira-coluna">
            <div class="text-start ">
                <div class="d-flex flex-column mb-4">
                    <h5 class="fw-light">Seu projeto</h5>
                        <input type="text" name="nome" id="nome-projeto" placeholder="nome do projeto" class="rounded p-3 input-text fw-light">
                        <small class="text-danger mb-3">{{ $errors->first('nome') }}</small>
            
                        <textarea
                            maxlength="60"
                            name="descricao"
                            cols="23"
                            rows="2"
                            class="rounded p-3 input-text fw-light hidden-overflow"
                            id="descricao-projeto"
                            placeholder="Descriçao do projeto">
                            
                        </textarea>
                        <small class="text-danger">{{ $errors->first('descricao') }}</small>
                </div>
                <div class="d-flex flex-column">
                    <h5 class="fw-light">Personalização</h5>
                    <input 
                        type="color" 
                        name="cor" 
                        placeholder="Selecione uma cor..." 
                        readonly 
                        class="rounded mb-3 input-text fw-light seletor-cor border"
                        data-cor>
                        
                    <button 
                        name="botao-salvar" 
                        class="p-3 rounded fw-light btn btn-primary" 
                        id="botao-salvar">
                        Salvar projeto
                    </button>
                </div>
            </div>
        </div>
    </div>
    </form>
@endsection