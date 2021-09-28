$('[data-editor-codigo]').on("keydown", function(event) {
    if (event.key == 'Tab') {
        var start = this.selectionStart;
        var end = this.selectionEnd;

        var $this = $(this);
        var value = $this.val();

        $this.val(value.substring(0, start) + "\t" + value.substring(end));

        this.selectionStart = this.selectionEnd = start + 1;

        event.preventDefault();
    }
});