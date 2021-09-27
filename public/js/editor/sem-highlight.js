<<<<<<< HEAD:public/js/sem-highlight.js
=======
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
>>>>>>> 74623675326c79154dd712dbfc9b2623daf246c3:public/js/editor/sem-highlight.js







