<?php
include('helper/strings.php');
$textareaContent = $_POST['bbcode'] ?? null;
$data = [];
if(!empty($_POST)) {
    $_POST['bbcode'] = input_clean($_POST['bbcode']);

    /* Check for any errors */
    $required_fields = ['bbcode'];
    foreach($required_fields as $field) {
        if(!isset($_POST[$field]) || (isset($_POST[$field]) && empty($_POST[$field]) && $_POST[$field] != '0')) {
            echo "Field is empty";
        }
    }

    // if(!\Altum\Csrf::check()) {
    //     Alerts::add_error(l('global.error_message.invalid_csrf_token'));
    // }

    if(!empty($_POST)) { 

        require_once('libs/ChrisKonnertz/BBCode/BBCode.php');
        require_once('libs/ChrisKonnertz/BBCode/Tag.php');
        // use ChrisKonnertz\BBCode\BBCode;
        $bbcode = new ChrisKonnertz\BBCode\BBCode();

        // $bbcode = new \ChrisKonnertz\BBCode\bbcode();
        $data['result'] = $bbcode->render($_POST['bbcode']);
    }
}

$values = [
    'bbcode' => $_POST['bbcode'] ?? null,
];

/* Prepare the View */
$data['values'] = $values;

?>

    <div class="card">
        <div class="card-body">

            <form action="" method="post" role="form">
                <input type="hidden" name="token" value="" />

                <div class="form-group">
                    <label for="bbcode"><i class="fa fa-fw fa-code fa-sm text-muted mr-1"></i> BBcode to html</label>
                    <textarea id="bbcode" name="bbcode" class="form-control" required="required"><?= $textareaContent  ?></textarea>
                    
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
                            <label for="result">BBcode to html</label>
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
