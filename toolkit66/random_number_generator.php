<?php 

$data = [];

if(!empty($_POST)) {
    $_POST['minimum'] = (int) $_POST['minimum'];
    $_POST['maximum'] = (int) $_POST['maximum'];

    /* Check for any errors */
    if($_POST['minimum'] > $_POST['maximum']) {
        $_POST['minimum'] = 0;
        $_POST['maximum'] = 100;
    }

    // if(!\Altum\Csrf::check()) {
    //     Alerts::add_error(l('global.error_message.invalid_csrf_token'));
    // }

    if(!empty($_POST && empty($errors))) { 

        $data['result'] = rand($_POST['minimum'], $_POST['maximum']);

    }
}

$values = [
    'minimum' => $_POST['minimum'] ?? 0,
    'maximum' => $_POST['maximum'] ?? 100,
];

/* Prepare the View */
$data['values'] = $values;

?>



    <div class="card">
        <div class="card-body">

            <form action="" method="post" role="form">
                <input type="hidden" name="token" value="" />

                <div class="form-group">
                    <label for="minimum"><i class="fa fa-fw fa-compress-arrows-alt fa-sm text-muted mr-1"></i> Minimum</label>
                    <input type="number" min="<?= PHP_INT_MIN ?>" max="<?= PHP_INT_MAX ?>" id="minimum" name="minimum" class="form-control" value="<?= $data['values']['minimum'] ?>" required="required" />
                    
                </div>

                <div class="form-group">
                    <label for="maximum"><i class="fa fa-fw fa-expand-arrows-alt fa-sm text-muted mr-1"></i> Maximum</label>
                    <input type="number" min="<?= PHP_INT_MIN ?>" max="<?= PHP_INT_MAX ?>" id="maximum" name="maximum" class="form-control" value="<?= $data['values']['maximum'] ?>" required="required" />
                    
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
                            <label for="result">Number</label>
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