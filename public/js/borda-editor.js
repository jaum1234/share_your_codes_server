const botaoCor = $(".cor-item");

botaoCor.each(function(index) {
    $(this).on("click", function() {
        const botaoCorId = $(this).attr("id");
        
        const editor = $(".editor");
        editor.attr("id", botaoCorId);
        
        const seletorCor = $(".seletor-cor");
        seletorCor.val(botaoCorId);
        seletorCor.css({background: botaoCorId, color: botaoCorId})
        
    })
})



