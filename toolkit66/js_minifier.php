<?php 
include('helper/others.php');
$data = [];
$errors = [];

if(!empty($_POST)) {

    /* Check for any errors */
    $required_fields = ['js'];
    foreach($required_fields as $field) {
        if(!isset($_POST[$field]) || (isset($_POST[$field]) && empty($_POST[$field]) && $_POST[$field] != '0')) {
            echo "Field is empty";
        }
    }

    // if(!\Altum\Csrf::check()) {
    //     Alerts::add_error(l('global.error_message.invalid_csrf_token'));
    // }
    require_once('vendors/hexydec/jslite/src/autoload.php');
    require_once('vendors/hexydec/tokenise/src/autoload.php');

    $jsdoc = new \hexydec\jslite\jslite();
    $jsdoc_load = $jsdoc->load($_POST['js']);

    if(!$jsdoc_load) {
        $errors['invalid'] = "We could not process your JS content.";
    }

    if(!empty($_POST && empty($errors))) { 
        $jsdoc->minify();
        $data['result'] = $jsdoc->compile() ?? null;

        $data['js_characters'] = mb_strlen($_POST['js']);
        $data['minified_js_characters'] = mb_strlen($data['result']);
    }
}

$values = [
    'js' => $_POST['js'] ?? null,
];

/* Prepare the View */
$data['values'] = $values;
?>


    <div class="card">
        <div class="card-body">

            <form action="" method="post" role="form">
                <input type="hidden" name="token" value="" />

                <div class="form-group">
                    <label for="js"><i class="fab fa-fw fa-js fa-sm text-muted mr-1"></i> JS</label>
                    <textarea id="js" name="js" class="form-control" required="required"><?= $data['values']['js'] ?></textarea>
                    <?php
                        if($errors){ 
                        echo $errors['invalid']; 
                        }
                    ?>
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
                            JS Characters
                            </td>
                            <td class="text-nowrap <?= $data['js_characters'] > $data['minified_js_characters'] ? 'text-danger' : 'text-success'; ?>">
                                <?= nr($data['js_characters']) ?>
                            </td>
                        </tr>

                        <tr>
                            <td class="font-weight-bold">
                            Minified JS characters	
                            </td>
                            <td class="text-nowrap <?= $data['js_characters'] >= $data['minified_js_characters'] ? 'text-success' : 'text-danger'; ?>">
                                <?= nr($data['minified_js_characters']) ?> <?= '(' . nr(get_percentage_difference($data['js_characters'], $data['minified_js_characters']), 2) . '%)' ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
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
                        <textarea id="result" class="form-control"><?= htmlspecialchars($data['result'], ENT_QUOTES, 'UTF-8') ?></textarea>
                    </div>

                </div>
            </div>
        </div>
    <?php endif ?>

    <?php include('partials/clipboard_js.php'); ?>