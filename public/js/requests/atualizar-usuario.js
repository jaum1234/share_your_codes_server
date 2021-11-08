$('form[name="formAtualizarUsuario"]').on("submit", event => {
    event.preventDefault();

    const dados = {
        name: $('input[name="name"]').val(),
        nickname: $('input[name="nickname"]').val(),
    }

    var id = $('#hidden-user-id').val();
    fetch('/usuarios/' + id + '/editar', {
        method: 'POST',
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-Token": $('input[name="_token"]').val(),
            "X-Requested-With": "XMLHttpRequest",
            "Accept": "application/json",
        },
        body: JSON.stringify(dados),
    }).then(resposta => resposta.json())
    .then(data => {
        if (data.success) {
            Swal.fire({
                title: data.message,
                icon: 'success'
            });
            return;
        }
        $.each(data.erros , function(chave, valor) {  
            $('small.' + chave + '__error').text(valor);
            setTimeout(function() {
                $('.error__text').text('');
            }, 10000);
        });
    })
});