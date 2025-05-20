<?php
include('helper/others.php');
$textareaContent = $_POST['text'] ?? null;
$data = [];
$errors = [];

if(!empty($_POST)) {
    // print_r($_FILES);
    // exit;
    $required_fields = [];
    foreach($required_fields as $field) {
        if(!isset($_POST[$field]) || (isset($_POST[$field]) && empty($_POST[$field]) && $_POST[$field] != '0')) {
            // echo "Field is empty";
        }
    }

    // if(!\Altum\Csrf::check()) {
    //     Alerts::add_error(l('global.error_message.invalid_csrf_token'));
    // }

    /* Image uploads */
    $image = !empty($_FILES['image']['name']);

    if(empty($image)){
        $errors['empty'] = 'Please select the file';
    }

    /* Check for any errors on the logo image */
    if($image) {
        $image_file_name = $_FILES['image']['name'];
        $image_file_extension = explode('.', $image_file_name);
        $image_file_extension = mb_strtolower(end($image_file_extension));
        $image_file_temp = $_FILES['image']['tmp_name'];

        if($_FILES['image']['error'] == UPLOAD_ERR_INI_SIZE) {
            // Alerts::add_error(sprintf(l('global.error_message.file_size_limit'), get_max_upload()));
        }

        if($_FILES['image']['error'] && $_FILES['image']['error'] != UPLOAD_ERR_INI_SIZE) {
            // Alerts::add_error(l('global.error_message.file_upload'));
        }

        if(!in_array($image_file_extension, ['gif', 'png', 'jpg', 'jpeg', 'svg'])) {
            // Alerts::add_error(l('global.error_message.invalid_file_type'));
        }

        // if(!empty($_POST && empty($errors))) {
        //     $data['result'] = base64_encode(file_get_contents($image_file_temp));
        // }

        if(!$_FILES['image']['error']) {
            $data['result'] = base64_encode(file_get_contents($image_file_temp));
        }
    }
}


$values = [
    'content' => $_POST['text'] ?? null,
    'image' => $_POST['image'] ?? null,
    'type' => $_POST['type'] ?? null,
];

/* Prepare the View */
$data['values'] = $values;
// print_r($data['result']);
?>

<div class="container">

    <div class="card">
        <div class="card-body">

            <form action="" method="post" role="form" enctype="multipart/form-data">
                <input type="hidden" name="token" value="" />

                <div class="form-group">
                    <label for="type"><i class="fa fa-fw fa-sm fa-fingerprint text-muted mr-1"></i>Base64 Image Converter</label>
                    <select id="type" name="type" class="form-control" required="required">
                        <option value="image_to_base64" <?= $data['values']['type'] == 'image_to_base64' ? 'selected="selected"' : null ?>>Image to Base64</option>
                        <option value="base64_to_image" <?= $data['values']['type'] == 'base64_to_image' ? 'selected="selected"' : null ?>>Base64 to Image</option>
                    </select>
                </div>

                <div class="form-group" data-type="base64_to_image">
                    <label for="text"><i class="fa fa-fw fa-paragraph fa-sm text-muted mr-1"></i> Text</label>
                    <textarea id="text" name="text" class="form-control" required="required"><?= $data['values']['content'] ?></textarea>
                </div>

                <div class="form-group" data-type="image_to_base64">
                    <label for="image"><i class="fa fa-fw fa-sm fa-image text-muted mr-1"></i> Image</label>
                    <input id="image" type="file" name="image" accept=".gif, .png, .jpg, .jpeg, .svg" class="form-control-file altum-file-input" />
                    <small class="form-text text-muted">Extensions Allowed , .gif, .png, .jpg, .jpeg, .svg . <?= ' Upload Max Size ' , get_max_upload(), 'MB' ?></small>
                    <p><?php echo $errors['empty'] ?? null; ?></p>
                </div>

                <button type="submit" name="submit" class="btn btn-block btn-primary">Submit</button>
            </form>

        </div>
    </div>

    <?php if(isset($_POST['submit']) && !$_FILES['image']['error'] ): ?>
        <div class="mt-4">

            <div class="card">
                <div class="card-body">

                    <?php if($data['values']['type'] == 'image_to_base64'): ?>
                        <div class="form-group">
                            <div class="d-flex justify-content-between align-items-center">
                                <label for="result">Text</label>
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
                            <textarea id="result" class="form-control"><?= $data['result'] ?></textarea>
                        </div>
                    <?php else: ?>
                        <div class="form-group">
                            <div class="d-flex justify-content-between align-items-center">
                                <label for="result">Image</label>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-fw fa-sm fa-download"></i> Download
                                    </button>

                                    <div class="dropdown-menu">
                                        <a href="data:image/png;base64,<?= $data['values']['content'] ?>" class="dropdown-item" download="<?= 'image' . '.png' ?>">PNG</a>
                                        <a href="data:image/jpg;base64,<?= $data['values']['content'] ?>" class="dropdown-item" download="<?= 'image' . '.jpg' ?>">JPG</a>
                                        <a href="data:image/webp;base64,<?= $data['values']['content'] ?>" class="dropdown-item" download="<?= 'image' . '.webp' ?>">WEBP</a>
                                        <a href="data:image/gif;base64,<?= $data['values']['content'] ?>" class="dropdown-item" download="<?= 'image' . '.gif' ?>">GIF</a>
                                    </div>
                                </div>
                            </div>

                            <img src="data:image/png;base64,<?= $data['values']['content'] ?>" class="img-fluid" />
                        </div>
                    <?php endif ?>
                </div>
            </div>

        </div>
    <?php endif ?>
</div>




<script>


    /* Type handler */
    let type_handler = () => {
        let type = document.querySelector('select[name="type"]').value;

        document.querySelectorAll(`[data-type]:not([data-type="${type}"])`).forEach(element => {
            element.classList.add('d-none');
            let input = element.querySelector('input,select,textarea');

            if(input) {
                input.setAttribute('disabled', 'disabled');
                if(input.getAttribute('required')) {
                    input.setAttribute('data-is-required', 'true');
                }
                input.removeAttribute('required');
            }
        });

        document.querySelectorAll(`[data-type="${type}"]`).forEach(element => {
            element.classList.remove('d-none');
            let input = element.querySelector('input,select,textarea');

            if(input) {
                input.removeAttribute('disabled');
                if(input.getAttribute('data-is-required')) {
                    input.setAttribute('required', 'required')
                }
            }
        });
    }

    type_handler();

    document.querySelector('select[name="type"]') && document.querySelector('select[name="type"]').addEventListener('change', type_handler);
</script>
<?php include('partials/clipboard_js.php'); ?>