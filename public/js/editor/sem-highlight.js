import {setLocalStorage} from '../local-storage.js'
import {getLocalStorage} from "../local-storage.js";

/**
 *  Desativa o modo highlight na 
 * pagina do editor
 */
$('#botao-sem-highlight').on('click', function () {
    setLocalStorage();
    
    location.reload();
})

getLocalStorage();







