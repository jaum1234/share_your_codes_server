/**
 *  Ativa o modo highlight na 
 * pagina do editor
 */

$('#botao-highlight').on('click', function () {
    $(this).attr("hidden", true);
    $('#botao-sem-highlight').attr("hidden", false);
    
    //funçao do highlight.js
    hljs.highlightAll();   
})
