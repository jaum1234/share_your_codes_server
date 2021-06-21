@extends('layout')

@section('conteudo')
    

<div class="col-9">
    <div class="d-flex flex-wrap ">
        @foreach ($projetos as $projeto)
        <div class="ps-3 mb-5">
            <a href="projeto/{{ $projeto->nome }}/{{ $projeto->id }}" 
               class="text-decoration-none text-light">
                <div class="d-flex flex-column">

                    <pre style="border-color: {{$projeto->cor}}" class="rounded p-3 editor editor-mini mb-n1 pointer fw-light"><code>{{ $projeto->codigo }}</code>
                    </pre>

                    <div class="info rounded p-3">
                        <h5 class="fw-light">{{ $projeto->nome }}</h5>
                        <p class="fw-light">{{ $projeto->descricao }}</p>
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


    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.0.1/highlight.min.js"></script>
    <script>
       hljs.highlightAll();
    </script>


@endsection