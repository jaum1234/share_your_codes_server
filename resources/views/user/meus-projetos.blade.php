@extends('layouts.main')

@section('conteudo')


      
      <div class="col mt-3" id="coluna-projetos">
        @foreach ($projetos as $projeto)
     
         
             <div class=" mb-5 bloco-editor" id="bloco-editor">
                 <a 
                    href="/projetos/{{ $projeto->id }}/{{ $projeto->nome }}" 
                    class="text-decoration-none text-light">
                    <div class="d-flex flex-column">

                        <pre style="border-color: {{ $projeto->cor }}" class="pointer fw-light rounded p-3 editor editor-mini height"><code contenteditable="false" id="#editor">{{ $projeto->codigo }}</code>
                        </pre>

                        <div class="info rounded p-3">
                            <h5 class=" fw-light">{{ $projeto->nome }}</h5>
                            <p class=" fw-light">{{ $projeto->descricao }}</p>
                            <div class="d-flex align-items-center">
                                <form
                                action="/projetos/excluir/{{ $projeto->id }}"
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
      <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.0.1/highlight.min.js"></script>
      <script>
          hljs.highlightAll();
      </script>
    

@endsection