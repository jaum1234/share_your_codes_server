
import {setLocalStorage} from './local-storage.js'
import {getLocalStorage} from "./local-storage.js";

$('[data-botao-highlight]').on('click', function () {
    $(this).attr("hidden", true);
    $('#botao-sem-highlight').attr("hidden", false);
    
    hljs.highlightAll();   
})

$('#botao-sem-highlight').on('click', function () {
    setLocalStorage();
    
    location.reload();
})

getLocalStorage();


