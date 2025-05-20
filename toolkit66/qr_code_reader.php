<?php 
    $data = [];
    $values = [
        'image' => $_POST['image'] ?? null,
    ];

    /* Prepare the View */
    $data['values'] = $values;
    $plug_fl =  plugin_dir_url( __FILE__ );
    $plug_dr =  plugin_dir_url( __DIR__ );
?>
    <div class="card">
        <div class="card-body">
            <form action="" method="post" role="form" enctype="multipart/form-data">
                <input type="hidden" name="token" value="" />
                <div class="form-group">
                    <label for="image"><i class="fa fa-fw fa-qrcode fa-sm text-muted mr-1"></i> Image</label>
                    <input type="file" id="image" name="image" accept=".png, .jpg, .jpeg, .svg, .webp" class="form-control-file altum-file-input" required="required" />
                </div>
            </form>
        </div>
    </div>

    <div class="mt-4">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <div class="d-flex justify-content-between align-items-center">
                        <label for="result">Result</label>
                        <div>
                            <button
                                    type="button"
                                    class="btn btn-link text-secondary"
                                    data-toggle="tooltip"
                                    title="clipboard_copy"
                                    aria-label="clipboard_copy"
                                    data-copy="clipboard_copy"
                                    data-copied="clipboard_copied"
                                    data-clipboard-target="#result"
                                    data-clipboard-text
                            >
                                <i class="fa fa-fw fa-sm fa-copy"></i>
                            </button>
                        </div>
                    </div>
                    <textarea id="result" class="form-control"></textarea>
                </div>

            </div>
        </div>
    </div>


    <script src="<?=  $plug_dr . 'assets/js/libraries/html5-qrcode.min.js' ?>"></script>
    <script>
        'use strict';
        const html5QrCode = new Html5Qrcode('image');

        const image = document.getElementById('image');
        image.addEventListener('change', event => {
            const file = image.files[0];

            if(!file) {
                return;
            }

            html5QrCode.scanFile(file, true)
                .then(decodedText => {
                    document.querySelector('#result').value = decodedText;
                })
                .catch(err => {
                    document.querySelector('#result').value = 'No data found.';
                });
        });
    </script>


<?php include('partials/clipboard_js.php'); ?>
