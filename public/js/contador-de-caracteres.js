/**
 *  Conta os caracteres do editor 
 * de codigo na pagina do editor
 */
const editor = $("#editor");
editor.on("input", function() {
    const contador = $("#contator-caracteres");
    const conteudo = editor.text();
    
    contador.text(conteudo.length);
    
})

