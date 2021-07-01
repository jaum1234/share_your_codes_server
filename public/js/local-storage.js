/**
 *  Define os valores no 
 * localstorage
 */
export function setLocalStorage () {
    localStorage.setItem('nome', $('#nome-projeto').val());
    localStorage.setItem('codigo', $('#editor').text());
    localStorage.setItem('descricao', $('#descricao-projeto').val());
    localStorage.setItem('cor', $('[data-cor]').val());
}

/**
 *  Pega o que esta definido
 * no localstorage
 */
export function getLocalStorage () {
    $('#nome-projeto').val(localStorage.nome);
    $('#descricao-projeto').val(localStorage.descricao);
    $('#editor').text(localStorage.codigo);
    $('#editor-pre').css("borderColor", localStorage.cor)
    $('[data-cor]').val(localStorage.cor)
}


