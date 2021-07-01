@extends('layouts.main')

@section('conteudo')

    <div class="col" id="coluna-projetos">
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
    
                <div class="pagination justify-content-center">
                    <form action="/pesquisar" method="POST">{{ $projetos->links() }}</form>
                </div>
    
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.0.1/highlight.min.js"></script>
    <script>
        hljs.highlightAll();
    </script>

@endsection