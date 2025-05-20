<?php 
include('helper/others.php');
$data = [];
$errors = [];
if(!empty($_POST)) {

    /* Check for any errors */
    $required_fields = ['html'];
    foreach($required_fields as $field) {
        if(!isset($_POST[$field]) || (isset($_POST[$field]) && empty($_POST[$field]) && $_POST[$field] != '0')) {
            echo "Field is empty";
        }
    }

    // if(!\Altum\Csrf::check()) {
    //     Alerts::add_error(l('global.error_message.invalid_csrf_token'));
    // }

    require_once('vendors/hexydec/htmldoc/src/autoload.php');
    require_once('vendors/hexydec/tokenise/src/autoload.php');
    $htmldoc = new \hexydec\html\htmldoc();
    $htmldoc_load = $htmldoc->load($_POST['html']);

    if(!$htmldoc_load) {
        $errors['invalid'] = "We could not process your HTML content.";
    }

    if(!empty($_POST && empty($errors))) { 
        $htmldoc->minify();
        $data['result'] = $htmldoc->save() ?? null;

        $data['html_characters'] = mb_strlen($_POST['html']);
        $data['minified_html_characters'] = mb_strlen($data['result']);
    }
}

$values = [
    'html' => $_POST['html'] ?? null,
];

/* Prepare the View */
$data['values'] = $values;
?>



    <div class="card">
        <div class="card-body">

            <form action="" method="post" role="form">
                <input type="hidden" name="token" value="" />

                <div class="form-group">
                    <label for="html"><i class="fab fa-fw fa-html5 fa-sm text-muted mr-1"></i> HTML</label>
                    <textarea id="html" name="html" class="form-control" required="required"><?= $data['values']['html'] ?></textarea>
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
                            HTML characters	
                            </td>
                            <td class="text-nowrap <?= $data['html_characters'] > $data['minified_html_characters'] ? 'text-danger' : 'text-success'; ?>">
                                <?= nr($data['html_characters']) ?>
                            </td>
                        </tr>

                        <tr>
                            <td class="font-weight-bold">
                            Minified HTML characters	
                            </td>
                            <td class="text-nowrap <?= $data['html_characters'] >= $data['minified_html_characters'] ? 'text-success' : 'text-danger'; ?>">
                                <?= nr($data['minified_html_characters']) ?> <?= '(' . nr(get_percentage_difference($data['html_characters'], $data['minified_html_characters']), 2) . '%)' ?>
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
                            <label for="result">Minified HTML</label>
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