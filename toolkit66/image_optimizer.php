<?php 
include('helper/links.php');
include('helper/others.php');
$data = [];

        if(!empty($_POST)) {
            $_POST['quality'] = (int) $_POST['quality'];
            $_POST['quality'] = $_POST['quality'] < 1 || $_POST['quality'] > 100 ? 75 : $_POST['quality'];

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
            if(!$image) {
                // Alerts::add_field_error('image', l('global.error_message.empty_field'));
                $errors['invalid'] = 'This field is required, you must fill it.';

            }

            if($image) {
                $image_file_name = $_FILES['image']['name'];
                $image_file_extension = explode('.', $image_file_name);
                $image_file_extension = mb_strtolower(end($image_file_extension));
                $image_file_temp = $_FILES['image']['tmp_name'];
                $image_file_type = mime_content_type($image_file_temp);

                if($_FILES['image']['error'] == UPLOAD_ERR_INI_SIZE) {
                    Alerts::add_error(sprintf(l('global.error_message.file_size_limit'), get_max_upload()));
                }

                if($_FILES['image']['size'] > 5 * 1000000) {
                    Alerts::add_error(sprintf(l('global.error_message.file_size_limit'), 5));
                }

                if($_FILES['image']['error'] && $_FILES['image']['error'] != UPLOAD_ERR_INI_SIZE) {
                    Alerts::add_error(l('global.error_message.file_upload'));
                }

                if(!in_array($image_file_extension, ['gif', 'png', 'jpg', 'jpeg', 'webp'])) {
                    Alerts::add_field_error('image', l('global.error_message.invalid_file_type'));
                }
                require_once('vendors/autoload_namespaces.php');

                /* Generate new name for image */
                $image_new_name = md5(time() . rand()) . '.' . $image_file_extension;

                /* Build the request to the API */
                $mime = mime_content_type($image_file_temp);
                $output = new \CURLFile($image_file_temp, $mime, $image_new_name);

                
                $body = \Unirest\Request\Body::multipart([
                    'files' => $output,
                ]);

                try {
                    $response = \Unirest\Request::post('http://api.resmush.it/?qlty=' . $_POST['quality'], [], $body);
                } catch (\Exception $exception) {
                    Alerts::add_field_error('image', l('tools.image_optimizer.error_message'));
                }
                // print_r($response);
                // print_r($response->body->dest);
                if(isset($response->body->error)) {
                    Alerts::add_field_error('image', l('tools.image_optimizer.error_message'));
                }
            }

            if(!empty($_POST && empty($errors))) { 
                $data['result']['original_file_url'] = $response->body->dest;
                // $data['result']['file_url'] = url('tools/view_image?url=' . urlencode($response->body->dest) . '&global_token=' . bin2hex(random_bytes(24)));
                $data['result']['file_url'] = $response->body->dest;
                $data['result']['original_size'] = $response->body->src_size;
                $data['result']['new_size'] = $response->body->dest_size;
                $data['result']['name'] = $image_new_name;
            }
        }

        $values = [
            'image' => $_POST['image'] ?? null,
            'quality' => $_POST['quality'] ?? 75,
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
                    <?php if(!empty($data['values']['image'])): ?>
                        <div class="m-1">
                            <img src="<?= UPLOADS_FULL_URL . 'image/' . $data['values']['image'] ?>" class="img-fluid" style="max-height: 2.5rem;height: 2.5rem;" />
                        </div>
                    <?php endif ?>
                    <input id="image" type="file" name="image" accept=".gif, .png, .jpg, .jpeg, .webp" class="form-control-file altum-file-input" />
                    
                    <small class="form-text text-muted">Accepted Extensions, '.gif, .png, .jpg, .jpeg, .webp' , File size limit 5MB</small>
                </div>

                <div class="form-group">
                    <label for="quality"><i class="fa fa-fw fa-sort-numeric-up fa-sm text-muted mr-1"></i> Quality</label>
                    <input type="number" min="1" max="100" id="quality" name="quality" class="form-control" value="<?= $data['values']['quality'] ?>" required="required" />
                    <p><?php echo $errors['invalid'] ?? null; ?></p>

                </div>

                <button type="submit" name="submit" class="btn btn-block btn-primary">Submit</button>
            </form>

        </div>
    </div>

    <?php if(isset($data['result'])): ?>
        <div class="mt-4">
            <div class="table-responsive table-custom-container">
                <table class="table table-custom">
                    <tbody>
                    <tr>
                        <td class="font-weight-bold">
                        Original size
                        </td>
                        <td class="text-nowrap <?= $data['result']['original_size'] > $data['result']['new_size'] ? 'text-danger' : 'text-success'; ?>">
                            <?= nr($data['result']['original_size']) . ' KB' ?>
                        </td>
                    </tr>

                    <tr>
                        <td class="font-weight-bold">
                        New size	
                        </td>
                        <td class="text-nowrap <?= $data['result']['original_size'] >= $data['result']['new_size'] ? 'text-success' : 'text-danger'; ?>">
                            <?= nr($data['result']['new_size']) . ' KB' ?> <?= '(' . nr(get_percentage_difference($data['result']['original_size'], $data['result']['new_size']), 2) . '%)' ?>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-4">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <img src="<?= $data['result']['file_url'] ?>" class="img-fluid mb-3" style="max-height: 20rem;" />
                    </div>

                    <div class="form-group">
                        <div class="d-flex justify-content-between align-items-center">
                            <label for="result">Result</label>
                            <div>
                                <a
                                        href="<?= $data['result']['original_file_url'] ?>"
                                        target="_blank"
                                        class="btn btn-link text-secondary"
                                        data-toggle="tooltip"
                                        title="Download"
                                        download="<?= $data['result']['name'] ?>"
                                >
                                    <i class="fa fa-fw fa-sm fa-download"></i>
                                </a>

                                <a
                                        href="<?= $data['result']['file_url'] ?>"
                                        target="_blank"
                                        class="btn btn-link text-secondary"
                                        data-toggle="tooltip"
                                        title="Open"
                                >
                                    <i class="fa fa-fw fa-sm fa-external-link-alt"></i>
                                </a>

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
                        <textarea id="result" class="form-control"><?= $data['result']['file_url'] ?></textarea>
                    </div>

                </div>
            </div>
        </div>
    <?php endif ?>

    <?php include('partials/clipboard_js.php'); ?>
