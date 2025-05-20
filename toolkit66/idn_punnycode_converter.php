<?php 
include('helper/strings.php');
$data = [];

if(!empty($_POST)) {
    $_POST['content'] = trim(input_clean($_POST['content']));
    $_POST['type'] = in_array($_POST['type'], ['to_punnycode', 'to_idn']) ? $_POST['type'] : 'to_punnycode';

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

    if(!empty($_POST && empty($errors))) { 

        $data['result'] = $_POST['type'] == 'to_punnycode' ? idn_to_ascii($_POST['content']) : idn_to_utf8($_POST['content']);

    }
}

$values = [
    'content' => $_POST['content'] ?? null,
    'type' => $_POST['type'] ?? null,
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
                    <textarea id="content" name="content" class="form-control" required="required"><?= $data['values']['content'] ?></textarea>
                    
                </div>

                <div class="form-group">
                    <label for="type"><i class="fa fa-fw fa-sm fa-fingerprint text-muted mr-1"></i> Type</label>
                    <select id="type" name="type" class="form-control" required="required">
                        <option value="to_punnycode" <?= $data['values']['type'] == 'to_punnycode' ? 'selected="selected"' : null ?>>Convert to Punnycode/ASCII</option>
                        <option value="to_idn" <?= $data['values']['type'] == 'to_idn' ? 'selected="selected"' : null ?>>Convert to IDN/Text</option>
                    </select>
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
                            <label for="result"><?= $_POST['type'] == 'to_punnycode' ? 'Punnycode/ASCII' : 'IDN/Text' ?></label>
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