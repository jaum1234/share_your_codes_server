let linkCopiado = '';

$(function() {
    linkCopiado = $('#copia').val();

    $('#compartilharFb').on('click', function () {  
        window.open('https://www.facebook.com/sharer/sharer.php?=u' + window.location.href, 'facebook-share-dialog',
        "width=626, height=436");
    })

    $('#compartilharTwitter').on('click', function () {  
        window.open('https://twitter.com/intent/tweet?url=' + window.location.href);
    })

    $('#compartilharWpp').on('click', function () {  
        window.open('https://api.whatsapp.com/send?text=' + window.location.href, '_blank');
    })
 
})



