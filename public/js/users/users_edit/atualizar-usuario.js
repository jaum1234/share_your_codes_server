$('form[name="formAtualizarUsuario"]').on("submit", event => {
    event.preventDefault();

    atualizar()
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

async function atualizar() {  
    const dados = {
        name: $('input[name="name"]').val(),
        nickname: $('input[name="nickname"]').val(),
    }

    var id = $('#hidden-user-id').val();
    let resposta = await fetch('/users/' + id, {
        method: 'PUT',
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-Token": $('input[name="_token"]').val(),
            "X-Requested-With": "XMLHttpRequest",
            "Accept": "application/json",
        },
        body: JSON.stringify(dados),
    });
    return resposta.json();
}