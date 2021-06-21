
const botaoConfirmar = $("#botao-confirmar");
const botaoEditar = $("#botao-editar");

function exibeFormularioEdicao() {
  
    botaoEditar.on('click', function() {
        $("#nome-usuario").attr("hidden", true);
        $("#input-nome-usuario").attr("hidden", false);
    
        $("#nome-completo").attr("hidden", true);
        const inputNomeCompleto = $("#input-nome-completo").attr("hidden", false);
        inputNomeCompleto.width('300px');
    
        botaoEditar.attr("hidden", true);
        const botaoConfirmar = $("#botao-confirmar").attr("hidden", false);
        
    })
}



        

