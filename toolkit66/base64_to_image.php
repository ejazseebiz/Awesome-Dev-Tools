<?php
include('helper/strings.php');
$textareaContent = $_POST['content'] ?? null;
$data = [];

if(!empty($_POST)) {
    $_POST['content'] = input_clean($_POST['content']);

    /* Check for any errors */
    $required_fields = ['content'];
    foreach($required_fields as $field) {
        if(!isset($_POST[$field]) || (isset($_POST[$field]) && empty($_POST[$field]) && $_POST[$field] != '0')) {
            echo "Field is empty";
        }
    }

    // if(!\Altum\Csrf::check()) {
    //     Alerts::add_error(l('global.error_message.invalid_csrf_token'));
    // }

    if(!empty($_POST)) { 
        $data['result'] = $_POST['content'];
    }
}

$values = [
    'content' => $_POST['content'] ?? null,
];

/* Prepare the View */
$data['values'] = $values;

?>


    <div class="card">
        <div class="card-body">

            <form action="" method="post" role="form">
                <input type="hidden" name="token" value="" />

                <div class="form-group">
                    <label for="content"><i class="fa fa-fw fa-paragraph fa-sm text-muted mr-1"></i> Content</label>
                    <textarea id="content" name="content" class="form-control" required="required"><?= $textareaContent; ?></textarea>
                </div>

                <button type="submit" name="submit" class="btn btn-block btn-primary">Submit</button>
            </form>

        </div>
    </div>

    <?php if(isset($_POST['submit'])): ?>
        <div class="mt-4">

            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <div class="d-flex justify-content-between align-items-center">
                            <label for="result">Base64 to Image Result</label>
                            <div class="dropdown">
                                <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-fw fa-sm fa-download"></i> Download
                                </button>

                                <div class="dropdown-menu">
                                    <a href="data:image/png;base64,<?= $data['result'] ?>" class="dropdown-item" download="download.png"><?= 'Download', 'PNG' ?></a>
                                    <a href="data:image/jpg;base64,<?= $data['result'] ?>" class="dropdown-item" download="download.jpg"><?= 'Download', 'JPG' ?></a>
                                    <a href="data:image/webp;base64,<?= $data['result'] ?>" class="dropdown-item" download="download.webp"><?= 'Download', 'WEBP' ?></a>
                                    <a href="data:image/gif;base64,<?= $data['result'] ?>" class="dropdown-item" download="download.gif"><?= 'Download', 'GIF' ?></a>
                                </div>
                            </div>
                        </div>

                        <img src="data:image/png;base64,<?= $data['result'] ?>" class="img-fluid" />
                    </div>

                </div>
            </div>

        </div>
    <?php endif ?>



