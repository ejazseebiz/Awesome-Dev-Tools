<?php 
include('helper/others.php');
$data = [];

        if(!empty($_POST)) {
            /* Check for any errors */
            $required_fields = [];
            foreach($required_fields as $field) {
                if(!isset($_POST[$field]) || (isset($_POST[$field]) && empty($_POST[$field]) && $_POST[$field] != '0')) {
                    echo "Field is empty";
                }
            }

            // if(!\Altum\Csrf::check()) {
            //     Alerts::add_error(l('global.error_message.invalid_csrf_token'));
            // }

            /* Image uploads */
            $image = !empty($_FILES['image']['name']);

            /* Check for any errors on the logo image */
            if($image) {
                $image_file_name = $_FILES['image']['name'];
                $image_file_extension = explode('.', $image_file_name);
                $image_file_extension = mb_strtolower(end($image_file_extension));
                $image_file_temp = $_FILES['image']['tmp_name'];

                if($_FILES['image']['error'] == UPLOAD_ERR_INI_SIZE) {
                    Alerts::add_error(sprintf(l('global.error_message.file_size_limit'), get_max_upload()));
                }

                if($_FILES['image']['error'] && $_FILES['image']['error'] != UPLOAD_ERR_INI_SIZE) {
                    Alerts::add_error(l('global.error_message.file_upload'));
                }

                if(!in_array($image_file_extension, ['gif', 'png', 'jpg', 'jpeg', 'svg'])) {
                    Alerts::add_error(l('global.error_message.invalid_file_type'));
                }

                if(!empty($_POST && empty($errors))) { 
                    $data['result'] = base64_encode(file_get_contents($image_file_temp));
                }
            }

        }

        $values = [
            'image' => $_POST['image'] ?? null,
        ];

        /* Prepare the View */
        $data['values'] = $values;

?>




    <div class="card">
        <div class="card-body">

            <form action="" method="post" role="form" enctype="multipart/form-data">
                <input type="hidden" name="token" value="" />

                <div class="form-group">
                    <label for="image"><i class="fa fa-fw fa-sm fa-image text-muted mr-1"></i> Image</label>
                    <input id="image" type="file" name="image" accept=".gif, .png, .jpg, .jpeg, .svg" class="form-control-file altum-file-input" />
                    <small class="form-text text-muted">Accepted Extensions, '.gif, .png, .jpg, .jpeg, .svg' ,  File size limit <?= get_max_upload() ?></small>
                </div>

                <button type="submit" name="submit" class="btn btn-block btn-primary">Submit</button>
            </form>

        </div>
    </div>

    <?php if(isset($data['result'])): ?>
        <div class="mt-4">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <div class="d-flex justify-content-between align-items-center">
                            <label for="result">Base64 Result</label>
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

                </div>
            </div>
        </div>
    <?php endif ?>

    <?php include('partials/clipboard_js.php'); ?>