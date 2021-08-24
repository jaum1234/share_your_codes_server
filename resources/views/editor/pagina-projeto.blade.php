@extends('layouts.main')

@section('conteudo')

            
            <div class="col mb-2" id="segunda-coluna">
                
                <div class="d-flex flex-column">
                    <pre style="border-color: {{ $projeto->cor }}" class="fw-light rounded p-3 editor"><code contenteditable="false" id="#editor">{{ $projeto->codigo }}</code>
                    </pre>
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
            <!-- Button trigger modal -->
           
        
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.0.1/highlight.min.js"></script>
    <script>
        hljs.highlightAll();
    </script>
@endsection