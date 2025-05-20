<script src="<?= ASSETSPATH . 'js/libraries/clipboard.min.js' ?>"></script>

<script>
    // 'use strict';
    $ = jQuery.noConflict(true);
    let clipboard = new ClipboardJS('[data-clipboard-text]');
    
    /* Copy full url handler */
    $('[data-clipboard-text]').on('click', event => {
        let copy = event.currentTarget.dataset.copy;
        let copied = event.currentTarget.dataset.copied;

        $(event.currentTarget).attr('data-original-title', copied).tooltip('show');

        setTimeout(() => {
            $(event.currentTarget).attr('data-original-title', copy);
        }, 500);
    });
</script>

