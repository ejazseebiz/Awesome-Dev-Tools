<?php 
include('helper/others.php');
$data = [];

        if(!empty($_POST)) {
            $_POST['kilograms'] = (float) $_POST['kilograms'];

            /* Check for any errors */
            $required_fields = ['kilograms'];
            foreach($required_fields as $field) {
                if(!isset($_POST[$field]) || (isset($_POST[$field]) && empty($_POST[$field]) && $_POST[$field] != '0')) {
                    echo "Field is empty";
                }
            }

            // if(!\Altum\Csrf::check()) {
            //     Alerts::add_error(l('global.error_message.invalid_csrf_token'));
            // }

            if(!empty($_POST && empty($errors))) { 
                $data['result'] = (float) ($_POST['kilograms'] * 2.205);
            }
        }

        $values = [
            'kilograms' => $_POST['kilograms'] ?? null,
        ];

        /* Prepare the View */
        $data['values'] = $values;
?>


    <div class="card">
        <div class="card-body">

            <form action="" method="post" role="form">
                <input type="hidden" name="token" value="" />

                <div class="form-group">
                    <label for="kilograms"><i class="fa fa-fw fa-balance-scale-left fa-sm text-muted mr-1"></i> Kilograms</label>
                    <input type="number" step=".01" id="kilograms" name="kilograms" class="form-control" value="<?= $data['values']['kilograms'] ?>" required="required" />
                    
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
                            <label for="result">Pounds</label>
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