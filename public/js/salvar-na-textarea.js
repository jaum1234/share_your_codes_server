$('#botao-salvar').on('click', function () {
    const editor = $('#editor').text();
    const editorHidden = $('#editor-hidden');
    editorHidden.text(editor);

    localStorage.clear();
})