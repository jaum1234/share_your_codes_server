$('form[name="formExcluirProjeto"]').on("submit", event => {
    event.preventDefault();
    var target = $(event.target);

    Swal.fire({
        title: 'Tem certeza que deseja excluir esse projeto?',
        showDenyButton: true,
        confirmButtonText: 'Sim',
        denyButtonText: `Nao`,
        showLoaderOnConfirm: true,

        preConfirm: function () {
            var id = target.find($('[data-input="excluir"]')).val();
            fetch('/projetos/excluir/' + id, {
                method: 'POST',
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-Token": $('input[name="_token"]').val()
                }
            }).then(() => {
                Swal.fire({
                    title: 'Projeto excluido!',
                    icon: 'success'
                });
                $('[data-projeto="' + id + '"]').hide();
            });
        }
    });
})


