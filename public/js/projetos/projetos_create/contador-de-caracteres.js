const editor = $("[data-editor-codigo]");

export default function contarCaracteres() {
    const contador = $("#contator-caracteres");
    const conteudo = editor.val();
    
    contador.text(conteudo.length);
}

editor.on("input", contarCaracteres);
