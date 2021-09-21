@extends('layouts.main')

@section('conteudo')  
      <div class="projeto col mt-3 projetos">
        @foreach ($projetos as $projeto)
     
         
             <div class=" mb-5 projeto">
                 <a 
                    href="/projetos/{{ $projeto->id }}/{{ $projeto->nome }}" 
                    class="text-decoration-none text-light">
                    <div class="d-flex flex-column">

                        <div style="border-color: {{ $projeto->cor }}" class="code editor editor--mini fw-light text-light mt-3 rounded p-3 mb-1" data-codigo-highlight>
{{ $projeto->codigo }}
                        </div>

                        <div class="projeto__info rounded p-3">
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
@endsection
@push('scripts')
    <script>
        hljs.highlightAll();
    </script>
@endpush

