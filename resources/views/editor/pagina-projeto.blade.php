@extends('layout')

@section('conteudo')
    <div class="col-9">
        <div>

            <pre 
                style="border-color: {{ $projeto->cor }}" 
                class="editor editor-big p-3 fs-7 fw-light rounded"><code>{{ $projeto->codigo }}</code>
            </pre>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Compartilhar
            </button>
  
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-2" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog  modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
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
    </div>
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.0.1/highlight.min.js"></script>
    <script>
       hljs.highlightAll();
    </script>
@endsection