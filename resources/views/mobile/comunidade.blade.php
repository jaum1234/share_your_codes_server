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
      <div class="col mt-3" id="coluna-projetos">
        @foreach ($projetos as $projeto)
     
         
             <div class=" mb-5 bloco-editor" id="bloco-editor">
                 <a 
                    href="/projeto/{{ $projeto->nome }}/{{ $projeto->id }}" 
                    class="text-decoration-none text-light">
                    <div class="d-flex flex-column">

                        <pre style="border-color: {{ $projeto->cor }}" class="pointer fw-light rounded p-3 editor editor-mini height"><code contenteditable="false" id="#editor">{{ $projeto->codigo }}</code>
                        </pre>

                        <div class="info rounded p-3">
                            <h5 class=" fw-light">{{ $projeto->nome }}</h5>
                            <p class=" fw-light">{{ $projeto->descricao }}</p>
                            <div class="d-flex align-items-center">
                                <a 
                                    href="#" 
                                    class="d-flex align-items-center text-decoration-none text-light">
                                    <i class="fas fa-user-circle fs-3 me-2 profile"></i>
                                    <span class="fw-light">{{ $projeto->user->nickname }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                 </a>
             </div>
         
     @endforeach
      </div>
    </div>
  </div>
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.0.1/highlight.min.js"></script>
    <script>
        hljs.highlightAll();
    </script>

@endsection