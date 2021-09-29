@extends('layouts.main')

@section('conteudo')

            
            <div class="col-10 mb-2 compartilhar">
                
                <div style="border-color: {{ $projeto->cor }}" class="code editor editor--compartilhar fw-light text-light mt-3 rounded p-3 mb-3" data-codigo-highlight>
{{ $projeto->codigo }}
                </div>
                
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#compartilhar">
                    Compartilhar
                </button>
                <!-- Modal -->
                <div class="modal fade" id="compartilhar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog  modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Compartilhar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="d-flex justify-content-around">
                                <a href=""
                                   class="fs-3"
                                   id="compartilharTwitter">
                                   <i class="fab fa-twitter-square"></i>
                                </a>
                                <a href=""
                                   class="fs-3"
                                   id="compartilharFb">
                                   <i class="fab fa-facebook-square"></i>
                                </a>
                                <a href=""
                                   class="fs-3 "
                                   id="compartilharWpp">
                                   <i class="fab fa-whatsapp-square"></i>
                                </a>
                            </div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        
@endsection
@push('scripts')
    <script type="module" src="{{ asset('/js/pagina-projeto/compartilhar.js') }}"></script>
    <script>
        document.querySelectorAll('div.code').forEach(el => {
            hljs.highlightElement(el);
        }); 
    </script>
@endpush