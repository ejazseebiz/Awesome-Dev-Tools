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
    
    require_once('vendors/autoload_namespaces.php');

    try {
        $response = \Unirest\Request::get($_POST['url']);
    } catch (\Exception $exception) {
        $errors['invalid'] = "Invalid Page URL";
    }

    if(!empty($_POST && empty($errors))) { 

        $data['result'] = $response->headers;

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
                    <label for="url"><i class="fa fa-fw fa-link fa-sm text-muted mr-1"></i> URL</label>
                    <input type="url" id="url" name="url" class="form-control" value="<?= $data['values']['url'] ?>" required="required" />
                    <p><?php echo $errors['invalid'] ?? null; ?></p>
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
                    <?php foreach($data['result'] as $key => $value): ?>
                        <tr>
                            <td class="font-weight-bold">
                                <?= $key ?>
                            </td>
                            <td class="text-nowrap">
                                <?= $value ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif ?>

    <?php include('partials/clipboard_js.php'); ?>
