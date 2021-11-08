async function salvarProjeto() {  
    const dados = {
        nome: $('input[name="nome"]').val(),
        codigo: $('textarea[name="codigo"]').val(),
        descricao: $('textarea[name="descricao"]').val(),
        cor: $('input[name="cor"]').val(),
    }

    const resposta = await fetch('/projetos', {
        method: 'POST',
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



            



