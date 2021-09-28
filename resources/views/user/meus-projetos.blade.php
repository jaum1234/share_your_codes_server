@extends('layouts.main')

@section('conteudo')  
        <div class="projeto col-10 projetos">
            <form
            action=""
            method="POST"
            name="formDeleteProject">
            @csrf
            <div class="modal fade" id="warningModal" tabindex="-1" aria-labelledby="warningModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-light">
                            <h5 class="modal-title" id="warningModalLabel">Tem certeza que deseja excluir esse projeto?</h5>
                        </div>
                        <div class="modal-footer bg-light">
                            <button type="submit" class="btn btn-success">Sim</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Não</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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
                                <button class="bg-transparent border-0" data-botao-deletar id="{{ $projeto->id }}">
                                    <i class="fas fa-trash text-danger"></i>
                                </button>
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
        $(function() {  
            $('[data-botao-deletar]').each(function() {  
                $(this).on("click", function (event) {
                    event.preventDefault();  
                    idProjeto = $(this).attr("id");
                    modal = $('#warningModal');
                    modal.modal('show');
                    $('form[name="formDeleteProject"]').attr("action", "/projetos/excluir/" + idProjeto) 
                });
            });
        })
    </script>    
    <script>
        document.querySelectorAll('div.code').forEach(el => {
            hljs.highlightElement(el);
        }); 
    </script>
@endpush

