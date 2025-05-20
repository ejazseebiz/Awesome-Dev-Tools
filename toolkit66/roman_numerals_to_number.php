<?php 
include('helper/others.php');
$data = [];

        if(!empty($_POST)) {
            $_POST['roman_numerals'] = input_clean($_POST['roman_numerals']);

            /* Check for any errors */
            $required_fields = ['roman_numerals'];
            foreach($required_fields as $field) {
                if(!isset($_POST[$field]) || (isset($_POST[$field]) && empty($_POST[$field]) && $_POST[$field] != '0')) {
                    echo "Field is empty";
                }
            }

            // if(!\Altum\Csrf::check()) {
            //     Alerts::add_error(l('global.error_message.invalid_csrf_token'));
            // }

            if(!empty($_POST && empty($errors))) { 
                function roman_numerals_to_number($roman_numerals) {
                    $romans = [
                        'M' => 1000,
                        'CM' => 900,
                        'D' => 500,
                        'CD' => 400,
                        'C' => 100,
                        'XC' => 90,
                        'L' => 50,
                        'XL' => 40,
                        'X' => 10,
                        'IX' => 9,
                        'V' => 5,
                        'IV' => 4,
                        'I' => 1,
                    ];
                    $result = 0;
                    foreach ($romans as $key => $value) {
                        while (strpos($roman_numerals, $key) === 0) {
                            $result += $value;
                            $roman_numerals = substr($roman_numerals, strlen($key));
                        }
                    }
                    return $result;
                }

                $data['result'] = roman_numerals_to_number($_POST['roman_numerals']);
            }
        }

        $values = [
            'roman_numerals' => $_POST['roman_numerals'] ?? null,
        ];

        /* Prepare the View */
        $data['values'] = $values;
?>



    <div class="card">
        <div class="card-body">

            <form action="" method="post" role="form">
                <input type="hidden" name="token" value="" />

                <div class="form-group">
                    <label for="roman_numerals"><i class="fa fa-fw fa-sort-numeric-up fa-sm text-muted mr-1"></i> Roman Numerals</label>
                    <input type="text" id="roman_numerals" name="roman_numerals" class="form-control" value="<?= $data['values']['roman_numerals'] ?>" required="required" />
                    
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
                            <label for="result">Number</label>
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