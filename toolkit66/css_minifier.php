<?php

include('helper/others.php');
$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );

$data = [];
$errors = [];

        if(!empty($_POST)) {

            /* Check for any errors */
            $required_fields = ['css'];
            foreach($required_fields as $field) {
                if(!isset($_POST[$field]) || (isset($_POST[$field]) && empty($_POST[$field]) && $_POST[$field] != '0')) {
                    echo "Field is empty";
                }
            }

            // if(!\Altum\Csrf::check()) {
            //     Alerts::add_error(l('global.error_message.invalid_csrf_token'));
            // }

            require_once('vendors/hexydec/cssdoc/src/autoload.php');
            require_once('vendors/hexydec/tokenise/src/autoload.php');
            // require_once('vendors/hexydec/cssdoc/src/cssdoc.php');
            // require_once('vendors/hexydec/cssdoc/src/tokens/document.php');
            // require_once('vendors/hexydec/cssdoc/src/tokens/rule.php');
            // require_once('vendors/hexydec/cssdoc/src/tokens/selector.php');
            // require_once('vendors/hexydec/cssdoc/src/tokens/property.php');
            // require_once('vendors/hexydec/cssdoc/src/tokens/value.php');
            // require_once('vendors/hexydec/tokenise/src/tokenise.php');
            $cssdoc = new \hexydec\css\cssdoc();
            $cssdoc_load = $cssdoc->load($_POST['css']);

            if(!$cssdoc_load) {
                // echo "We could not process your CSS content.";
                $errors['invalid'] = "We could not process your CSS content.";
            }

            if(!empty($_POST && empty($errors))) { 
                $cssdoc->minify();
                $data['result'] = $cssdoc->save() ?? null;

                $data['css_characters'] = mb_strlen($_POST['css']);
                $data['minified_css_characters'] = mb_strlen($data['result']);
            }
        }

        $values = [
            'css' => $_POST['css'] ?? null,
        ];

        /* Prepare the View */
        $data['values'] = $values;
     

?>
<script src="<?php echo $plug_fl; ?>js/custom.js"></script>
    <div class="card">
        <div class="card-body">

            <form action="" method="post" role="form">
                <input type="hidden" name="token" value="" />

                <div class="form-group">
                    <label for="css"><i class="fab fa-fw fa-css3 fa-sm text-muted mr-1"></i> CSS</label>
                    <textarea id="css" name="css" class="form-control" required="required"><?= $data['values']['css'] ?></textarea>
                    <?php
                        if($errors){ 
                        echo $errors['invalid']; 
                        }
                    ?>
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
                               CSS Characters
                            </td>
                            <td class="text-nowrap <?= $data['css_characters'] > $data['minified_css_characters'] ? 'text-danger' : 'text-success'; ?>">
                                <?= nr($data['css_characters']) ?>
                            </td>
                        </tr>

                        <tr>
                            <td class="font-weight-bold">
                            Minified CSS characters	
                            </td>
                            <td class="text-nowrap <?= $data['css_characters'] >= $data['minified_css_characters'] ? 'text-success' : 'text-danger'; ?>">
                                <?= nr($data['minified_css_characters']) ?> <?= '(' . nr(get_percentage_difference($data['css_characters'], $data['minified_css_characters']), 2) . '%)' ?>
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
                        <textarea id="result" class="form-control"><?= htmlspecialchars($data['result'], ENT_QUOTES, 'UTF-8') ?></textarea>
                    </div>

                </div>
            </div>
        </div>
    <?php endif ?>


    <?php include('partials/clipboard_js.php'); ?>