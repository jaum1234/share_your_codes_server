const cor = $('#cor-projeto');

cor.on('input', function () {
    let corValor = $(this).val();
    $('#editor-pre').css("borderColor", corValor);
})