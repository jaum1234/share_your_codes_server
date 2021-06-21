@extends('layout')

@section('conteudo')    

        
        
        <form action="" method="POST" class="row col-9 formulario-editor" id="caixa-editor">
            @csrf
        <div class="col-8">
                <div class="d-flex justify-content-center">
                    <div class="d-flex flex-column ">
                        
                        <pre class="editor editor-normal p-3 fw-light text-light" id="editor-pre"><code contenteditable="true" id="editor"></code></pre>
                        
                        <textarea 
                            name="editor" 
                            id="editor-hidden" 
                            hidden>
                        </textarea>
                        
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
        </div>
        <div class="col-4">
            <div class="text-start">
                <div class="d-flex flex-column mb-4">
                    <h5 class="fw-light">Seu projeto</h5>
                    <input type="text" name="nome" id="nome-projeto" placeholder="nome do projeto" class="rounded mb-3 p-3 input-text fw-light">
                    <textarea 
                        maxlength="60" 
                        name="descricao" 
                        cols="30" 
                        rows="2" 
                        class="rounded p-3 input-text fw-light"
                        id="descricao-projeto">
                    </textarea>
                </div>
                <div class="d-flex flex-column">
                    <h5 class="fw-light">Personalização</h5>
                    <input 
                        type="color" 
                        name="cor" 
                        placeholder="Selecione uma cor..." 
                        readonly 
                        id="cor-projeto"
                        class="rounded mb-3 input-text fw-light seletor-cor border">
                    <button 
                        name="botao-salvar" 
                        class="botao-salvar p-3 rounded fw-light" 
                        id="botao-salvar">
                        Salvar projeto
                    </button>
                </div>
            </div>
        </div>
    </form>



@endsection