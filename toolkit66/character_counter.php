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

            if(!empty($_POST)) { 
                $data['result']['characters'] = mb_strlen($_POST['text']);
                $data['result']['words'] = str_word_count($_POST['text']);
                $data['result']['lines'] = substr_count($_POST['text'], "\r\n") + 1;
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
                                Characters
                            </td>
                            <td class="text-nowrap">
                                <?= nr($data['result']['characters']) ?>
                            </td>
                        </tr>

                        <tr>
                            <td class="font-weight-bold">
                                Words
                            </td>
                            <td class="text-nowrap">
                                <?= nr($data['result']['words']) ?>
                            </td>
                        </tr>

                        <tr>
                            <td class="font-weight-bold">
                                Lines
                            </td>
                            <td class="text-nowrap">
                                <?= nr($data['result']['lines']) ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif ?>


    <?php include('partials/clipboard_js.php'); ?>