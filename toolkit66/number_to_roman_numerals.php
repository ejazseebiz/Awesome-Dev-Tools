<?php 
include('helper/others.php');
$data = [];

        if(!empty($_POST)) {
            $_POST['number'] = (float) $_POST['number'];

            /* Check for any errors */
            $required_fields = ['number'];
            foreach($required_fields as $field) {
                if(!isset($_POST[$field]) || (isset($_POST[$field]) && empty($_POST[$field]) && $_POST[$field] != '0')) {
                    echo "Field is empty";
                }
            }

            // if(!\Altum\Csrf::check()) {
            //     Alerts::add_error(l('global.error_message.invalid_csrf_token'));
            // }

            if(!empty($_POST && empty($errors))) { 
                function number_to_roman_numerals($number) {
                    $map = ['M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1];
                    $returnValue = '';
                    while ($number > 0) {
                        foreach ($map as $roman => $int) {
                            if($number >= $int) {
                                $number -= $int;
                                $returnValue .= $roman;
                                break;
                            }
                        }
                    }
                    return $returnValue;
                }

                $data['result'] = number_to_roman_numerals($_POST['number']);
            }
        }

        $values = [
            'number' => $_POST['number'] ?? null,
        ];

        /* Prepare the View */
        $data['values'] = $values;
?>



    <div class="card">
        <div class="card-body">

            <form action="" method="post" role="form">
                <input type="hidden" name="token" value="" />

                <div class="form-group">
                    <label for="number"><i class="fa fa-fw fa-sort-numeric-up-alt fa-sm text-muted mr-1"></i> Number</label>
                    <input type="number" step="1" id="number" name="number" class="form-control" value="<?= $data['values']['number'] ?>" required="required" />
                    
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
                            <label for="result">Roman Numerals</label>
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