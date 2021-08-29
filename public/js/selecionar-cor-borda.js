const cor = $('[data-cor]');

cor.on('input', function () {
    let corValor = $(this).val();
    $('#editor-pre').css("borderColor", corValor);
})

