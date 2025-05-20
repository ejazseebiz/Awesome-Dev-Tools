<?php
$jsonContent = $_POST['json'] ?? null;
$errors = [];


if(!empty($_POST)) { 
        /* Check for any errors */
        $required_fields = ['json'];
        foreach($required_fields as $field) {
            if(!isset($_POST[$field]) || (isset($_POST[$field]) && empty($_POST[$field]) && $_POST[$field] != '0')) {
                echo "Field is empty";
            }
        }
        $jsonData = stripslashes(html_entity_decode($_POST['json']));
        $data['result'] = json_decode($jsonData, true);

        if(!$data['result']) {
            $errors['invalid'] = "Invalid JSON";
        }
    }

    $values = [
        'json' => $_POST['json'] ?? null,
    ];

    /* Prepare the View */
    $data['values'] = $values;

?>


   <div class="card">
       <div class="card-body">
           <form action="" method="post" role="form">
               <input type="hidden" name="token" value="" />
               <div class="form-group">
                   <label for="json"><i class="fa fa-fw fa-project-diagram fa-sm text-muted mr-1"></i> JSON</label>
                   <textarea id="json" name="json" class="form-control"  required="required"><?= stripslashes(html_entity_decode($jsonContent)); ?></textarea>
                   <?php 
                    echo $errors['invalid'] ?? null;
                   ?>
               </div>
               <button type="submit" name="submit" value="submit" class="btn btn-block btn-primary">Submit</button>
           </form>
       </div>
   </div>

   <?php if(isset($_POST['submit']) && !empty($_POST['submit']) && $data['result'] !== null): ?>

           <div class="card">
               <div class="card-body">
                   <div class="form-group">
                       <div class="d-flex justify-content-between align-items-center">
                           <label for="result" class="text-success">JSON format is valid</label>
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
                       <textarea id="result" class="form-control"><?= json_encode($data['result'], JSON_PRETTY_PRINT) ?></textarea>
                   </div>
               </div>
           </div>
   
   <?php endif ?>


   <?php include('partials/clipboard_js.php'); ?>
