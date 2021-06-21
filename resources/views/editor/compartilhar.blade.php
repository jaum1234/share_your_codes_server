@extends('layout-form')

@section('formulario')
        <div class="d-flex mb-3">
            <input value="" 
                   type="text " 
                   class="fw-light p-2 input-text me-2 rounded" 
                   id="copia">
            <button id="botaoCopiar" class="btn btn-light">
                <i class="fas fa-clipboard"></i>
            </button>
        </div>
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
               class="fs-3" 
               id="compartilharWpp">
               <i class="fab fa-whatsapp-square"></i>
            </a>
            <a href="" 
               class="fs-3" 
               id="compartilharEmail">
               <i class="fas fa-envelope"></i>
            </a>
        </div>
@endsection