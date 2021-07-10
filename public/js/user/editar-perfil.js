/**
 *  Exibe formulario pra alterar
 * dados do perfil do usuario
 */
const botaoEditar = $("#botao-editar");
const botaoConfirmar = $("#botao-confirmar");

const nomeUsuario = $("#nome-usuario");
const inputNomeUsuario =  $("#input-nome-usuario");

const nomeCompleto = $("#nome-completo");
const inputNomeCompleto = $("#input-nome-completo")

botaoEditar.on('click', function() {
    nomeUsuario.attr("hidden", true);
    inputNomeUsuario.attr("hidden", false);

    nomeCompleto.attr("hidden", true);
    inputNomeCompleto.attr("hidden", false);
    inputNomeCompleto.width('300px');

    botaoEditar.attr("hidden", true);
    botaoConfirmar.attr("hidden", false);
})




        

