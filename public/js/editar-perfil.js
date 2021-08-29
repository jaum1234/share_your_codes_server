const botaoEditar = $("[data-botao-editar]");
const botaoConfirmar = $("[data-botao-confirmar]")

botaoEditar.on('click', function() {
    $("#nome-usuario").attr("hidden", true);
    $("#input-nome-usuario").attr("hidden", false);

    $("#nome-completo").attr("hidden", true);
    const inputNomeCompleto = $("#input-nome-completo").attr("hidden", false);
    inputNomeCompleto.width('300px');

    botaoEditar.attr("hidden", true);
    $("#botao-confirmar").attr("hidden", false);
    
});

botaoConfirmar.on('click', function() {
    $("#nome-usuario").attr("hidden", false);
    $("#input-nome-usuario").attr("hidden", true);

    $("#nome-completo").attr("hidden", false);
    $("#input-nome-completo").attr("hidden", true);

    botaoEditar.attr("hidden", false);
    $("#botao-confirmar").attr("hidden", true);
});

 
   





        

