import corBorda from "./selecionar-cor-borda.js";
import salvarProjetoLocastorage from './salvar-projeto-localstorage.js';
import highlight from './highlight.js';
import whiteSpaces from './whitespaces.js'
import contarCaracteres from './contador-de-caracteres.js';

import './salvar-projeto.js';

$(function () {  
    corBorda();
    salvarProjetoLocastorage();
    highlight();
    whiteSpaces();
    contarCaracteres();
});