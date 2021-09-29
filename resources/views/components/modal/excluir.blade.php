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