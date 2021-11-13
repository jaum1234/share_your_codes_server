const cor = $('[data-cor]');

function corBorda() {
    cor.on('input', function () {
        let corValor = $(this).val();
        $('[data-editor-codigo]').css("borderColor", corValor);
        $('[data-codigo-highlight]').css("borderColor", $('[data-cor]').val())
    })
}

export default corBorda;



