<?php 
include('helper/others.php');
$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );
$data = [];

if(!empty($_POST)) {

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

        $lines_array = explode("\r\n", $_POST['text']);
        $new_lines_array = array_unique($lines_array);

        $data['result']['text'] = implode("\r\n", $new_lines_array);
        $data['result']['lines'] = substr_count($_POST['text'], "\r\n") + 1;
        $data['result']['new_lines'] = count($new_lines_array);
        $data['result']['removed_lines'] = count($lines_array) - count($new_lines_array);

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
                                Lines
                            </td>
                            <td class="text-nowrap">
                                <?= nr($data['result']['lines']) ?>
                            </td>
                        </tr>

                        <tr>
                            <td class="font-weight-bold">
                                New Lines
                            </td>
                            <td class="text-nowrap">
                                <?= nr($data['result']['new_lines']) ?>
                            </td>
                        </tr>

                        <tr>
                            <td class="font-weight-bold">
                                Removed Lines
                            </td>
                            <td class="text-nowrap">
                                <?= nr($data['result']['removed_lines']) ?>
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
                            <label for="result">Text</label>
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
                        <textarea id="result" class="form-control"><?= $data['result']['text'] ?></textarea>
                    </div>

                </div>
            </div>
        </div>
    <?php endif ?>

    <?php include('partials/clipboard_js.php'); ?>