
import {setLocalStorage} from './local-storage.js'
import {getLocalStorage} from "./local-storage.js";

const editor = $('[data-editor-codigo]');

$('[data-botao-highlight]').on('click', function () {
    $(this).attr("hidden", true);
    $('#botao-sem-highlight').attr("hidden", false);
    const valEditor = editor.val();
    $('[data-codigo-highlight]').attr("hidden", false).html(valEditor).css("borderColor", $('[data-cor]').val());
    editor.attr("hidden", true);

    document.querySelectorAll('div.code').forEach(el => {
        hljs.highlightElement(el);
    }); 
})

$('#botao-sem-highlight').on('click', function () {
    setLocalStorage();
    
    location.reload();
})

getLocalStorage();


