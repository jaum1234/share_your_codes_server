const cor = $('[data-cor]');

cor.on('input', function () {
    let corValor = $(this).val();
    $('[data-editor-codigo]').css("borderColor", corValor);
    $('[data-codigo-highlight]').css("borderColor", $('[data-cor]').val())
})



