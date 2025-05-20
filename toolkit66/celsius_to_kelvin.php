<?php
include('helper/others.php');
$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );

$data = [];
if(!empty($_POST)) {
    $_POST['celsius'] = (float) $_POST['celsius'];

    /* Check for any errors */
    $required_fields = ['celsius'];
    foreach($required_fields as $field) {
        if(!isset($_POST[$field]) || (isset($_POST[$field]) && empty($_POST[$field]) && $_POST[$field] != '0')) {
            echo "Field is empty";
        }
    }

    // if(!\Altum\Csrf::check()) {
    //     Alerts::add_error(l('global.error_message.invalid_csrf_token'));
    // }

    if(!empty($_POST)) { 
        $data['result'] = (float) (($_POST['celsius'] * 9 / 5) + 32);
    }
}

$values = [
    'celsius' => $_POST['celsius'] ?? null,
];

/* Prepare the View */
$data['values'] = $values;
?>

    <div class="card">
        <div class="card-body">

            <form action="" method="post" role="form">
                <input type="hidden" name="token" value="" />

                <div class="form-group">
                    <label for="celsius"><i class="fa fa-fw fa-temperature-low fa-sm text-muted mr-1"></i> Celsius</label>
                    <input type="number" step=".01" id="celsius" name="celsius" class="form-control" value="<?= $data['values']['celsius'] ?>" required="required" />
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
                            <label for="result">Kelvin</label>
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