<?php 
include('helper/strings.php');

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

    if(!empty($_POST && empty($errors))) { 

        mb_internal_encoding('utf-8');

        /* Replace all non words characters with the specified $delimiter */
        $string = preg_replace('/[^\p{L}\d-]+/u', '-', $_POST['text']);

        /* Check for double $delimiters and remove them so it only will be 1 delimiter */
        $string = preg_replace('/-+/u', '-', $string);

        /* Remove the $delimiter character from the start and the end of the string */
        $string = trim($string, '-');

        /* lowercase */
        $string = mb_strtolower($string);

        $data['result'] = $string;

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
                    <textarea id="text" name="text" class="form-control" required="required"><?= $data['values']['text'] ?></textarea>
                    
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
                                Result
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
                                            data-clipboard-text="<?= $data['result'] ?>"
                                    >
                                        <i class="fa fa-fw fa-sm fa-copy"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif ?>

    <?php include('partials/clipboard_js.php'); ?>