/**
 *  Gera os links para compartilhamento
 */

export function gerarLink (id, url, extraInfo = "", moreExtraInfo = "") {
    
    $(id).on('click', function () {  
        window.open(url + window.location.href, extraInfo, moreExtraInfo);
    });
}