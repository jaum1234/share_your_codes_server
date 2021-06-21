@extends('layout')

@section('conteudo')
 <div class="col-9">
    <div class="d-flex flex-xl-wrap ">
     @foreach ($projetos as $projeto)
     
         
             <div class="ps-3 mb-5" >
                 <a 
                    href="/projeto/{{ $projeto->nome }}/{{ $projeto->id }}" 
                    class="text-decoration-none text-light">
                    <div class="d-flex flex-column" id="bloco-editor">

                        <pre style="border-color: {{ $projeto->cor }}" class="pointer fw-light rounded p-3 editor editor-mini"><code contenteditable="false" id="#editor">{{ $projeto->codigo }}</code>
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

 <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.0.1/highlight.min.js"></script>
 <script>
    hljs.highlightAll();
 </script>

@endsection