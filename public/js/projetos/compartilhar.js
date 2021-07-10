import {gerarLink} from "./gerador-de-links.js";

/**
 *  Botoes de compartilhamento
 */

/**
 *  Twitter
 */
gerarLink("#compartilharTwitter", "https://twitter.com/intent/tweet?url=");

/**
 *  Facebook
 */
gerarLink(
    "#compartilharFb", 
    "https://www.facebook.com/sharer/sharer.php?=u", 
    "facebook-share-dialog", 
    "width=626, height=436");

/**
 *  Whatsapp
 */
gerarLink("#compartilharWpp", "https://api.whatsapp.com/send?text=")










