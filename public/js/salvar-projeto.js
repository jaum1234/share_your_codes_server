import {setLocalStorage} from './local-storage.js'

/**
 *  Amarmazena os dados do editor de codigo
 * em um input
 */
$('[data-botao-salvar]').on('click', function () {
    const editor = $('#editor').text();
    const editorHidden = $('#editor-hidden');
    editorHidden.text(editor);

    setLocalStorage();
})


