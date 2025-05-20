<?php
include('helper/strings.php');
$textareaContent = $_POST['text'] ?? null;
$data = [];

if(!empty($_POST)) {
    $_POST['text'] = input_clean($_POST['text']);

    /* Check for any errors */
    $required_fields = ['text'];
    foreach($required_fields as $field) {
        if(!isset($_POST[$field]) || (isset($_POST[$field]) && empty($_POST[$field]) && $_POST[$field] != '0')) {
            echo "Field is empty";
        }
    }

    // if(!\Altum\Csrf::check()) {
    //     Alerts::add_error(l('global.error_message.invalid_csrf_token'));
    // }

    if(!empty($_POST)) {
        $data['result'] = password_hash($_POST['text'], PASSWORD_DEFAULT);
    }
}

$values = [
    'text' => $_POST['text'] ?? null,
];

/* Prepare the View */
$data['values'] = $values;


?>
    <div class="card">
        <div class="card-body">

            <form action="" method="post" role="form">
                <input type="hidden" name="token" value="" />

                <div class="form-group">
                    <label for="text"><i class="fa fa-fw fa-paragraph fa-sm text-muted mr-1"></i> Text</label>
                    <textarea id="text" name="text" class="form-control" required="required"><?= $textareaContent ?></textarea>
                </div>

                <button type="submit" name="submit" class="btn btn-block btn-primary">Submit</button>
            </form>

        </div>
    </div>

    <?php if(isset($_POST['submit'])): ?>
        <div class="mt-4">
        <div class="card">
                <div class="card-body">
            <div class="table-responsive table-custom-container">
                <table class="table table-custom">
                    <tbody>
                        <tr>
                            <td class="font-weight-bold">
                            Bcrypt Hash	
                            </td>
                            <td class="text-nowrap">
                                <?= $data['result'] ?>
                            </td>
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
                                       data-clipboard-target="#result"
                                       data-clipboard-text
                                >
                                    <i class="fa fa-fw fa-sm fa-copy"></i>
                                </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                </div>
        </div>            </div>
        </div>
    <?php endif ?>


    <?php include('partials/clipboard_js.php'); ?>
