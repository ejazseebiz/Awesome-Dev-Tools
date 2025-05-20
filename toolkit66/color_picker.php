<?php

$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );
$data = [];

$values = [
    'color' => $_POST['color'] ?? '#000000',
];

/* Prepare the View */
$data['values'] = $values;

?>

    <div class="card">
        <div class="card-body">

            <form action="" method="post" role="form">
                <input type="hidden" name="token" value="" />

                <div class="form-group">
                    <label for="color"><i class="fa fa-fw fa-palette fa-sm text-muted mr-1"></i> Color</label>
                    <input type="text" id="color" name="color" class="form-control" value="<?= $data['values']['color'] ?>" required="required" />
                </div>
            </form>

        </div>
    </div>

    <div id="result_wrapper" class="mt-4 d-none">
        <div class="table-responsive table-custom-container">
            <table class="table table-custom">
                <tbody>
                <tr>
                    <td class="font-weight-bold">
                        HEXA
                    </td>
                    <td class="text-nowrap" id="hexa"></td>
                    <td>
                        <div class="d-flex justify-content-end">
                            <button
                                    type="button"
                                    class="btn btn-link text-secondary"
                                    data-toggle="tooltip"
                                    title="clipboard_copy"
                                    aria-label="clipboard_copy"
                                    data-copy="clipboard_copy"
                                    data-copied="clipboard_copied"
                                    data-clipboard-text=""
                                    id="hexa_button"
                            >
                                <i class="fa fa-fw fa-sm fa-copy"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="font-weight-bold">
                        CMYK
                    </td>
                    <td class="text-nowrap" id="cmyk"></td>
                    <td>
                        <div class="d-flex justify-content-end">
                            <button
                                    type="button"
                                    class="btn btn-link text-secondary"
                                    data-toggle="tooltip"
                                    title="clipboard_copy"
                                    aria-label="clipboard_copy"
                                    data-copy="clipboard_copy"
                                    data-copied="clipboard_copied"
                                    data-clipboard-text=""
                                    id="cmyk_button"
                            >
                                <i class="fa fa-fw fa-sm fa-copy"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="font-weight-bold">
                        HSLA
                    </td>
                    <td class="text-nowrap" id="hsla"></td>
                    <td>
                        <div class="d-flex justify-content-end">
                            <button
                                    type="button"
                                    class="btn btn-link text-secondary"
                                    data-toggle="tooltip"
                                    title="clipboard_copy"
                                    aria-label="clipboard_copy"
                                    data-copy="clipboard_copy"
                                    data-copied="clipboard_copied"
                                    data-clipboard-text=""
                                    id="hsla_button"
                            >
                                <i class="fa fa-fw fa-sm fa-copy"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="font-weight-bold">
                        HSVA
                    </td>
                    <td class="text-nowrap" id="hsva"></td>
                    <td>
                        <div class="d-flex justify-content-end">
                            <button
                                    type="button"
                                    class="btn btn-link text-secondary"
                                    data-toggle="tooltip"
                                    title="clipboard_copy"
                                    aria-label="clipboard_copy"
                                    data-copy="clipboard_copy"
                                    data-copied="clipboard_copied"
                                    data-clipboard-text=""
                                    id="hsva_button"
                            >
                                <i class="fa fa-fw fa-sm fa-copy"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="font-weight-bold">
                        RGBA
                    </td>
                    <td class="text-nowrap" id="rgba"></td>
                    <td>
                        <div class="d-flex justify-content-end">
                            <button
                                    type="button"
                                    class="btn btn-link text-secondary"
                                    data-toggle="tooltip"
                                    title="clipboard_copy"
                                    aria-label="clipboard_copy"
                                    data-copy="clipboard_copy"
                                    data-copied="clipboard_copied"
                                    data-clipboard-text=""
                                    id="rgba_button"
                            >
                                <i class="fa fa-fw fa-sm fa-copy"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>



<?php ob_start() ?>
<link href="<?=  $plug_dr . 'assets/css/libraries/pickr.min.css' ?>" rel="stylesheet" media="screen">


<?php ob_start() ?>
<script src="<?=  $plug_dr . 'assets/js/libraries/pickr.min.js' ?>"></script>
<script>
    /* Initiate the color picker */
    let pickr_options = {
        comparison: false,
        components: {
            preview: true,
            opacity: true,
            hue: true,
            comparison: false,
            interaction: {
                hex: true,
                rgba: true,
                hsla: true,
                hsva: true,
                cmyk: true,
                input: true,
                clear: false,
                save: false,
            }
        }
    };

    let pickr = Pickr.create({
        el: '#color',
        default: document.querySelector('#color').value,
        ...pickr_options
    });

    pickr.on('change', hsva => {
        document.querySelector('#result_wrapper').classList.remove('d-none');
        document.querySelector('#hexa').innerHTML = hsva.toHEXA().toString(0);
        document.querySelector('#hexa_button').setAttribute('data-clipboard-text', hsva.toHEXA().toString(0));
        document.querySelector('#cmyk').innerHTML = hsva.toCMYK().toString(0);
        document.querySelector('#cmyk_button').setAttribute('data-clipboard-text', hsva.toCMYK().toString(0));
        document.querySelector('#hsla').innerHTML = hsva.toHSLA().toString(0);
        document.querySelector('#hsla_button').setAttribute('data-clipboard-text', hsva.toHSLA().toString(0));
        document.querySelector('#hsva').innerHTML = hsva.toHSVA().toString(0);
        document.querySelector('#hsva_button').setAttribute('data-clipboard-text', hsva.toHSVA().toString(0));
        document.querySelector('#rgba').innerHTML = hsva.toRGBA().toString(0);
        document.querySelector('#rgba_button').setAttribute('data-clipboard-text', hsva.toRGBA().toString(0));
    });

    document.querySelector('form').addEventListener('submit', event => {
        event.preventDefault();
    });
</script>

<?php include('partials/clipboard_js.php'); ?>