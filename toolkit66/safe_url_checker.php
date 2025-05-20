<?php 
$data = [];

if(!empty($_POST)) {
    $_POST['url'] = filter_var($_POST['url'], FILTER_SANITIZE_URL);

    /* Check for any errors */
    $required_fields = ['url'];
    foreach($required_fields as $field) {
        if(!isset($_POST[$field]) || (isset($_POST[$field]) && empty($_POST[$field]) && $_POST[$field] != '0')) {
            echo "Field is empty";
        }
    }

    // if(!\Altum\Csrf::check()) {
    //     Alerts::add_error(l('global.error_message.invalid_csrf_token'));
    // }

    if(!empty($_POST && empty($errors))) { 
        $data['result'] = !google_safe_browsing_check($_POST['url'], settings()->links->google_safe_browsing_api_key);
    }
}

$values = [
    'url' => $_POST['url'] ?? null,
];

/* Prepare the View */
$data['values'] = $values;
?>



    <div class="card">
        <div class="card-body">

            <form action="" method="post" role="form">
                <input type="hidden" name="token" value="" />

                <div class="form-group">
                    <label for="url"><i class="fa fa-fw fa-link fa-sm text-muted mr-1"></i> <?= l('tools.url') ?></label>
                    <input type="url" id="url" name="url" class="form-control <?= \Altum\Alerts::has_field_errors('url') ? 'is-invalid' : null ?>" value="<?= $data['values']['url'] ?>" required="required" />
                    <?= \Altum\Alerts::output_field_error('url') ?>
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
                        <td class="text-nowrap <?= $data['result'] ? 'text-success' : 'text-danger'; ?>">
                            <?= l($data['result'] ? 'tools.safe_url_checker.result.safe' : 'tools.safe_url_checker.result.unsafe') ?>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif ?>

    <?php include('partials/clipboard_js.php'); ?>
