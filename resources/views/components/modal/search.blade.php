<div id="modal-search">
    <button type="button button--search" class="me-2 bg-transparent border-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="fas fa-search fs-5 text-light"></i>
    </button>
    
    <form action="{{ route('pesquisar') }}">
        <div class="modal fade search" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Buscar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <input type="text" class="form-control" placeholder="Busque aqui..." name="q">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-success">Buscar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>