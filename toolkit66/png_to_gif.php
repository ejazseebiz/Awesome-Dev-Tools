<?php
$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );

$data = [];

$values = [
    'image' => $_POST['image'] ?? null,
    'quality' => $_POST['quality'] ?? 85,
];

/* Prepare the View */
$data['values'] = $values;


?>

<script src="<?php echo $plug_fl; ?>js/custom.js"></script>

    <div class="card">
        <div class="card-body">

            <form action="" method="post" role="form" enctype="multipart/form-data" class="img-form">
                <input type="hidden" name="token" value="" />

                <div class="form-group">
                    <label for="image"><i class="fa fa-fw fa-sm fa-image text-muted mr-1"></i> Image</label>
                    <input id="image" type="file" name="image" accept=".png" class="form-control-file altum-file-input" />
                    
                    <small class="form-text text-muted">Accepted Extensions, '.png'</small>
                    <div class="error noimage d-none">Please select the image first</div>

                </div>

                <div class="form-group">
                    <label for="quality"><i class="fa fa-fw fa-sort-numeric-up fa-sm text-muted mr-1"></i> Quality</label>
                    <input type="number" min="1" max="100" id="quality" name="quality" class="form-control" value="<?= $data['values']['quality'] ?>" required="required" />
                    
                </div>

                <button type="submit" name="submit" class="btn btn-block btn-primary" data-is-ajax>Submit</button>
            </form>

        </div>
    </div>

    <div id="result_wrapper" class="mt-4 d-none">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <img id="preview" src="" class="img-fluid mb-3" style="max-height: 20rem;" />
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <label for="result">Result</label>
                    <div>
                        <a
                                href=""
                                target="_blank"
                                class="btn btn-link text-secondary"
                                data-toggle="tooltip"
                                title="Download"
                                download="<?= 'result' . '.gif' ?>"
                                id="download"
                        >
                            <i class="fa fa-fw fa-sm fa-download"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <?php include('partials/clipboard_js.php'); ?>
  
    
<script>

    let convert = () => {
        pause_submit_button(document.querySelector('[type="submit"][name="submit"]'));

        const file = document.getElementById('image').files[0];
        const quality = parseInt(document.getElementById('quality').value) / 100;

        if(!file) {
            /* Hide result wrapper */
            document.querySelector('#result_wrapper').classList.add('d-none');
            document.querySelector('.error.noimage').classList.remove('d-none');
            return;
        }

        /* Display result wrapper */
        document.querySelector('#result_wrapper').classList.remove('d-none');
        document.querySelector('.error.noimage').classList.add('d-none');

        /* Initiate file reader */
        let file_reader = new FileReader();

        /* Input the content of the uploaded file */
        file_reader.readAsDataURL(file);

        /* Onload */
        file_reader.onload = function(event) {

            /* Create the image object */
            let image = new Image;
            image.crossOrigin = 'anonymous';

            /* Onload */
            image.onload = function() {
                /* Get original width & height */
                let width  = image.naturalWidth  || image.width;
                let height = image.naturalHeight || image.height;

                /* Create canvas */
                let canvas = document.createElement('canvas');

                canvas.width = width;
                canvas.height = height;

                /* Draw image */
                let context = canvas.getContext('2d');
                context.drawImage(image, 0, 0, width, height);

                /* Generate new image data */
                let new_image_data = canvas.toDataURL(`image/gif`, quality);

                /* Display it */
                document.querySelector('#preview').setAttribute('src', new_image_data);

                /* Prepare download button */
                document.querySelector('#download').href = new_image_data;

                enable_submit_button(document.querySelector('[type="submit"][name="submit"]'));
            }

            /* Trigger the onload function */
            image.src = event.target.result;

        }

    }

    document.getElementById('image').addEventListener('change', convert);
    document.getElementById('quality').addEventListener('change', convert);
    document.querySelector('form.img-form').addEventListener('submit', event => {
       event.preventDefault();
       convert();
    });
</script>

