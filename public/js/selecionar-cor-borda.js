const cor = $('[data-cor]');

/**
 *  Seletor de cor
 */
cor.on('input', function () {
    let corValor = $(this).val();
    $('#editor-pre').css("borderColor", corValor);
})

