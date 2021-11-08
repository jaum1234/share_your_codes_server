import {setLocalStorage} from '../local-storage.js'

function salvarProjetoLocastorage() {
    $('[data-conteudo-principal-form]').on('submit', function() {
        setLocalStorage();
    })
}

export default salvarProjetoLocastorage;