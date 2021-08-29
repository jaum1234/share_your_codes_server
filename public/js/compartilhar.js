function gerarLink(id, url, extraInfo = "", moreExtraInfo = "") {
    
    $(id).on('click', function () {  
        window.open(url + window.location.href, extraInfo, moreExtraInfo);
    });
}

gerarLink("#compartilharTwitter", "https://twitter.com/intent/tweet?url=");

gerarLink(
    "#compartilharFb", 
    "https://www.facebook.com/sharer/sharer.php?=u", 
    "facebook-share-dialog", 
    "width=626, height=436");

gerarLink("#compartilharWpp", "https://api.whatsapp.com/send?text=");









