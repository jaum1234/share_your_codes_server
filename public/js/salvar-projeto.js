import {setLocalStorage} from './local-storage.js'

$('[data-conteudo-principal-form]').on('submit', function() {
    setLocalStorage();
})