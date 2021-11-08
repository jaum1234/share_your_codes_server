$('form[name="formSalvarProjeto"]').on("submit", event => {
    event.preventDefault();
    
    const dados = {
        nome: $('input[name="nome"]').val(),
        codigo: $('textarea[name="codigo"]').val(),
        descricao: $('textarea[name="descricao"]').val(),
        cor: $('input[name="cor"]').val(),
    }

    fetch('/projetos', {
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
                title: 'Projeto salvo com sucesso!',
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
        



