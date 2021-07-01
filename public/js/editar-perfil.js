const botaoEditar = $("#botao-editar");

/**
 *  Exibe formulario pra alterar
 * dados do perfil do usuario
 */
botaoEditar.on('click', function() {
    $("#nome-usuario").attr("hidden", true);
    $("#input-nome-usuario").attr("hidden", false);

    $("#nome-completo").attr("hidden", true);
    const inputNomeCompleto = $("#input-nome-completo").attr("hidden", false);
    inputNomeCompleto.width('300px');

    botaoEditar.attr("hidden", true);
    $("#botao-confirmar").attr("hidden", false);
    
})




        

