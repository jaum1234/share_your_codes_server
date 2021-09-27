$(function() {  
    contarCaracteres();
})

const editor = $("[data-editor-codigo]");

function contarCaracteres() {
    const contador = $("#contator-caracteres");
<<<<<<< HEAD:public/js/contador-de-caracteres.js
    const conteudo = editor.val();
=======
    const conteudo = $(this).text();
>>>>>>> 74623675326c79154dd712dbfc9b2623daf246c3:public/js/editor/contador-de-caracteres.js
    
    contador.text(conteudo.length);
}

editor.on("input", contarCaracteres);
