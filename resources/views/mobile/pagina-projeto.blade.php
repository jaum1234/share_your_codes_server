@extends('mobile.layout')

@section('conteudo')
<div class="container mt-3">
    
      
        <div class=" mb-2">
            <a 
               href="/projeto/{{ $projeto->nome }}/{{ $projeto->id }}" 
               class="text-decoration-none text-light">
               <div class="d-flex flex-column">

                   <pre style="border-color: {{ $projeto->cor }}" class="pointer fw-light rounded p-3 editor height"><code contenteditable="false" id="#editor">{{ $projeto->codigo }}</code>
                   </pre>
               </div>
            </a>
        </div>
        <!-- Button trigger modal -->
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