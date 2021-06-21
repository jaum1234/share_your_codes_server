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
                                <form
                                action="/excluir/{{ $projeto->id }}"
                                method="POST"
                                onsubmit="return confirm('Tem certeza de deseja excluir esse projeto?')">
                                @csrf
                                <button class="bg-transparent border-0">
                                    <i class="fas fa-trash text-danger"></i>
                                </button>
                            </form>
                            </div>
                        </div>
                    </div>
                 </a>
             </div>
         
     @endforeach
      </div>
    </div>
  </div>

@endsection