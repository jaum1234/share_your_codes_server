const editor = $("#editor");

function contarCaracteres() {
    const contador = $("#contator-caracteres");
    const conteudo = editor.text();
    
    contador.text(conteudo.length);
}

editor.on("input", contarCaracteres);
