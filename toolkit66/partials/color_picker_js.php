


    <?php if(!isset($data->exclude_css)): ?>
        <?php ob_start() ?>
        <link href="<?= ASSETSPATH . 'css/libraries/pickr.min.css' ?>" rel="stylesheet" media="screen">

        <?php endif ?>

    <?php ob_start() ?>
    <?php if(!isset($data->exclude_js)): ?>
        <script src="<?= ASSETSPATH . 'js/libraries/pickr.min.js' ?>"></script>
    <?php endif ?>

    <script>
        'use strict';

        /* Initiate the color picker when needed */
        document.querySelectorAll('[data-color-picker]').forEach(element => {
            let picker_element = document.createElement('div');
            element.insertAdjacentElement('afterend', picker_element);

            let delay_timer = null

            Pickr.create({
                el: picker_element,
                default: element.value,
                comparison: false,
                components: {
                    preview: true,
                    opacity: <?= json_encode(isset($data->opacity)) ?>,
                    hue: true,
                    comparison: false,
                    interaction: {
                        hex: true,
                        rgba: false,
                        hsla: false,
                        hsva: false,
                        cmyk: false,
                        input: true,
                        clear: false,
                        save: false,
                    }
                }
            }).on('change', hsva => {
                if(delay_timer) clearTimeout(delay_timer);

                delay_timer = setTimeout(() => {
                    element.value = hsva.toHEXA();
                    element.dispatchEvent(new Event('change'));
                }, 250);
            });
        });
    </script>


