<?php 
include('helper/others.php');
include('helper/strings.php');
 $data = [];

 if(!empty($_POST)) {
     $_POST['type'] = in_array($_POST['type'], ['A-Z', 'Z-A']) ? $_POST['type'] : 'A-Z';

     /* Check for any errors */
     $required_fields = ['text'];
     foreach($required_fields as $field) {
         if(!isset($_POST[$field]) || (isset($_POST[$field]) && empty($_POST[$field]) && $_POST[$field] != '0')) {
            echo "Field is empty";
         }
     }

    //  if(!\Altum\Csrf::check()) {
    //      Alerts::add_error(l('global.error_message.invalid_csrf_token'));
    //  }

    if(!empty($_POST && empty($errors))) { 
         $result = array_filter(explode("\r\n", $_POST['text']));
         array_map('input_clean', $result);
         switch ($_POST['type']) {
             case 'A-Z':
                 sort($result);
                 break;

             case 'Z-A':
                 rsort($result);
                 break;
         }
         $data['result'] = implode("\r\n", $result);
     }
 }

 $values = [
     'text' => $_POST['text'] ?? null,
     'type' => $_POST['type'] ?? 'A-Z',
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

                <div class="form-group">
                    <label for="type"><i class="fa fa-fw fa-sm fa-fingerprint text-muted mr-1"></i> Type</label>
                    <select id="type" name="type" class="form-control" required="required">
                        <option value="A-Z" <?= $data['values']['type'] == 'A-Z' ? 'selected="selected"' : null ?>>A-Z</option>
                        <option value="Z-A" <?= $data['values']['type'] == 'Z-A' ? 'selected="selected"' : null ?>>Z-A</option>
                    </select>
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
                            <label for="result">Result</label>
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
