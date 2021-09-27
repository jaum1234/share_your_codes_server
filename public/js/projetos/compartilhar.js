function gerarLink(id, url, extraInfo = "", moreExtraInfo = "") {
    
    $(id).on('click', function () {  
        window.open(url + window.location.href, extraInfo, moreExtraInfo);
    });
}

<<<<<<< HEAD:public/js/compartilhar.js
=======
/**
 *  Botoes de compartilhamento
 */

/**
 *  Twitter
 */
>>>>>>> 74623675326c79154dd712dbfc9b2623daf246c3:public/js/projetos/compartilhar.js
gerarLink("#compartilharTwitter", "https://twitter.com/intent/tweet?url=");

gerarLink(
    "#compartilharFb", 
    "https://www.facebook.com/sharer/sharer.php?=u", 
    "facebook-share-dialog", 
    "width=626, height=436"
    );

gerarLink("#compartilharWpp", "https://api.whatsapp.com/send?text=");









