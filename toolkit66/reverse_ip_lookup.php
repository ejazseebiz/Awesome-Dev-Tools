<?php 
include('helper/others.php');
include('helper/strings.php');
 $data = [];
 $errors = [];
 if(!empty($_POST)) {
     $_POST['ip'] = input_clean($_POST['ip']);

     /* Check for any errors */
     $required_fields = ['ip'];
     foreach($required_fields as $field) {
         if(!isset($_POST[$field]) || (isset($_POST[$field]) && empty($_POST[$field]) && $_POST[$field] != '0')) {
            echo "Field is empty";
         }
     }

    //  if(!\Altum\Csrf::check()) {
    //      Alerts::add_error(l('global.error_message.invalid_csrf_token'));
    //  }

     if(!filter_var($_POST['ip'], FILTER_VALIDATE_IP)) {
        //  Alerts::add_field_error('ip', l('tools.reverse_ip_lookup.error_message'));
        $errors['invalid'] = "Invalid IP Address";
     }

     if(!empty($_POST && empty($errors))) { 
         $data['result'] = gethostbyaddr($_POST['ip']);
     }
 }

 $values = [
     'ip' => $_POST['ip'] ?? get_ip(),
 ];

 /* Prepare the View */
 $data['values'] = $values;
?>



    <div class="card">
        <div class="card-body">

            <form action="" method="post" role="form">
                <input type="hidden" name="token" value="" />

                <div class="form-group">
                    <label for="ip"><i class="fa fa-fw fa-search-location fa-sm text-muted mr-1"></i> IP</label>
                    <input type="text" id="ip" name="ip" class="form-control" value="<?= $data['values']['ip'] ?>" required="required" />
                    <p><?php echo $errors['invalid'] ?? null; ?></p>
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
