
export function setLocalStorage () {
    localStorage.setItem('nome', $('#nome-projeto').val());
    localStorage.setItem('codigo', $('#editor').val());
    localStorage.setItem('descricao', $('#descricao-projeto').val());
    localStorage.setItem('cor', $('[data-cor]').val());
}


export function getLocalStorage () {
    $('#nome-projeto').val(localStorage.nome);
    $('#descricao-projeto').val(localStorage.descricao);
    $('#editor').val(localStorage.codigo);
    $('#editor').css("borderColor", localStorage.cor)
    $('[data-cor]').val(localStorage.cor)
}


