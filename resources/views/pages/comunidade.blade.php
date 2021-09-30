@extends('layouts.main')

@section('conteudo')
    
    <div class="col-10 projetos">
        @foreach ($projetos as $projeto)
     
            
            <div class=" mb-5 projetos__projeto projeto">
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
        {{ $projetos->render() }}
    </div>
@endsection
@push('scripts')
    <script>

    </script>
    <script>
        document.querySelectorAll('div.code').forEach(el => {
            hljs.highlightElement(el);
        }); 
    </script>
@endpush