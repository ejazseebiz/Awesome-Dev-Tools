<?php
include('helper/others.php');
$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );

$data = [];

if(!empty($_POST)) {
    $_POST['years'] = (int) $_POST['years'];

    /* Check for any errors */
    $required_fields = ['years'];
    foreach($required_fields as $field) {
        if(!isset($_POST[$field]) || (isset($_POST[$field]) && empty($_POST[$field]) && $_POST[$field] != '0')) {
            echo "Field is empty";
        }
    }

    // if(!\Altum\Csrf::check()) {
    //     Alerts::add_error(l('global.error_message.invalid_csrf_token'));
    // }

    if(!empty($_POST && empty($errors))) { 
        $data['result'] = $_POST['years'] * (24 * 365);
    }
}

$values = [
    'years' => $_POST['years'] ?? 1,
];

/* Prepare the View */
$data['values'] = $values;

?>

    <div class="card">
        <div class="card-body">

            <form action="" method="post" role="form" enctype="multipart/form-data">
                <input type="hidden" name="token" value="" />

                <div class="form-group">
                    <label for="years"><i class="fa fa-fw fa-sort-numeric-up-alt fa-sm text-muted mr-1"></i> Years</label>
                    <input type="number" step="1" id="years" name="years" class="form-control" value="<?= $data['values']['years'] ?>" required="required" />
                    
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
                            <label for="result">Hours</label>
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
                        <textarea id="result" class="form-control"><?= nr($data['result'], 2) ?></textarea>
                    </div>

                </div>
            </div>
        </div>
    <?php endif ?>


    <?php include('partials/clipboard_js.php'); ?>
