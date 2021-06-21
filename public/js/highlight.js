$(function () {
    $('#botao-highlight').on('click', function () {
        $(this).attr("hidden", true);
        $('#botao-sem-highlight').attr("hidden", false);
        
        hljs.highlightAll();   
    })

    $('#botao-sem-highlight').on('click', function () {
        localStorage.setItem('nome', $('#nome-projeto').val());
        localStorage.setItem('codigo', $('#editor').text());
        localStorage.setItem('descricao', $('#descricao-projeto').val());
        localStorage.setItem('cor', $('#cor-projeto').val());
        
        location.reload();
    })
})

$('#nome-projeto').val(localStorage.nome);
$('#descricao-projeto').val(localStorage.descricao);
$('#editor').text(localStorage.codigo);
$('#editor-pre').css("borderColor", localStorage.cor)
$('#cor-projeto').val(localStorage.cor)

