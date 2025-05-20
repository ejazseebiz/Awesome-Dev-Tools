<style>
    .mb-3 {margin-bottom:16px;}
    </style>
<?php 
$data = [];

if(!empty($_POST)) {
    $_POST['characters'] = (int) mb_substr($_POST['characters'], 0, 2048);
    $_POST['numbers'] = isset($_POST['numbers']);
    $_POST['symbols'] = isset($_POST['symbols']);
    $_POST['lowercase'] = isset($_POST['lowercase']);
    $_POST['uppercase'] = isset($_POST['uppercase']);

    /* Check for any errors */
    $required_fields = ['characters'];
    foreach($required_fields as $field) {
        if(!isset($_POST[$field]) || (isset($_POST[$field]) && empty($_POST[$field]) && $_POST[$field] != '0')) {
            echo "Field is empty";
        }
    }

    // if(!\Altum\Csrf::check()) {
    //     Alerts::add_error(l('global.error_message.invalid_csrf_token'));
    // }

    if(!empty($_POST && empty($errors))) { 

        $available_characters = '';

        if($_POST['numbers']) $available_characters .= '0123456789';
        if($_POST['symbols']) $available_characters .= '!@#$%^&*()_+=-[],./\\\'<>?:"|{}';
        if($_POST['lowercase']) $available_characters .= 'abcdefghijklmnopqrstuvwxyz';
        if($_POST['uppercase']) $available_characters .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $available_characters = str_split($available_characters);
        shuffle($available_characters);

        $password = '';

        for($i = 1; $i <= $_POST['characters']; $i++) {
            $password .= $available_characters[array_rand($available_characters)];
        }

        $data['result'] = $password;

    }
}

$values = [
    'characters' => $_POST['characters'] ?? 8,
    'numbers' => $_POST['numbers'] ?? true,
    'symbols' => $_POST['symbols'] ?? true,
    'lowercase' => $_POST['lowercase'] ?? true,
    'uppercase' => $_POST['uppercase'] ?? true,
];

/* Prepare the View */
$data['values'] = $values;

?>


    <div class="card">
        <div class="card-body">

            <form action="" method="post" role="form">
                <input type="hidden" name="token" value="" />

                <div class="form-group">
                    <label for="characters"><i class="fa fa-fw fa-sort-numeric-up fa-sm text-muted mr-1"></i> Characters</label>
                    <input type="number" min="1" max="2048" id="characters" name="characters" class="form-control" value="<?= $data['values']['characters'] ?>" required="required" />
                   
                </div>

                <div class="custom-control custom-checkbox mb-3">
                    <input id="numbers" name="numbers" type="checkbox" class="custom-control-input" <?= $data['values']['numbers'] ? 'checked="checked"' : null ?>>
                    <label class="custom-control-label" for="numbers">
                    Include numbers

                    </label>
                </div>

                <div class="custom-control custom-checkbox mb-3">
                    <input id="symbols" name="symbols" type="checkbox" class="custom-control-input" <?= $data['values']['symbols'] ? 'checked="checked"' : null ?>>
                    <label class="custom-control-label" for="symbols">
                    Include Symbols
                    </label>
                </div>

                <div class="custom-control custom-checkbox mb-3">
                    <input id="lowercase" name="lowercase" type="checkbox" class="custom-control-input" <?= $data['values']['lowercase'] ? 'checked="checked"' : null ?>>
                    <label class="custom-control-label" for="lowercase">
                    Include lowercase characters
                    </label>
                </div>

                <div class="custom-control custom-checkbox mb-3">
                    <input id="uppercase" name="uppercase" type="checkbox" class="custom-control-input" <?= $data['values']['uppercase'] ? 'checked="checked"' : null ?>>
                    <label class="custom-control-label" for="uppercase">
                    Include UPPERCASE characters
                    </label>
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
                            <label for="result">Password</label>
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