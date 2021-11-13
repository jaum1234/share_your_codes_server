@extends('layouts.main')

@section('conteudo')  
        <div class="projeto col-10 projetos">
        <x-modal.excluir/>
        @foreach ($projetos as $projeto)
            <div class="mb-5 projeto" data-projeto="{{ $projeto->id }}">
                <a 
                    href="{{ route('projetos.show', ['id' => $projeto->id]) }}" 
                    class="text-decoration-none text-light">
                    <div class="d-flex flex-column">

                        <div style="border-color: {{ $projeto->cor }}" class="code editor editor--mini fw-light text-light mt-3 rounded p-3 mb-1" data-codigo-highlight>
{{ $projeto->codigo }}
                        </div>

                        <div class="projeto__info rounded p-3">
                            <h5 class=" fw-light">{{ $projeto->nome }}</h5>
                            <p class=" fw-light">{{ $projeto->descricao }}</p>
                            <form name="formExcluirProjeto" action="{{ route('projetos.destroy', ['id' => $projeto->id]) }}">
                                @csrf
                                <input data-input="excluir" type="hidden" value="{{ $projeto->id }}">
                                <div class="d-flex align-items-center">
                                    <button class="bg-transparent border-0" data-botao-deletar id="{{ $projeto->id }}">
                                        <i class="fas fa-trash text-danger"></i>
                                    </button>
                                </div>
                            </form>
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
@section('js')
<script src="{{ asset('js/requests/excluir-projeto.js') }}"></script>
<script>
    document.querySelectorAll('div.code').forEach(el => {
        hljs.highlightElement(el);
    }); 
</script>
@endsection

