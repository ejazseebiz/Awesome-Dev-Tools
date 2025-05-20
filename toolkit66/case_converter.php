<?php
include('helper/strings.php');
$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );


$data = [];

if(!empty($_POST)) {
    $_POST['text'] = input_clean($_POST['text']);
    $_POST['type'] = in_array($_POST['type'], ['lowercase', 'uppercase', 'sentencecase', 'camelcase', 'pascalcase', 'capitalcase', 'constantcase', 'dotcase', 'snakecase', 'paramcase']) ? $_POST['type'] : 'lowercase';

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

        switch($_POST['type']) {
            case 'lowercase':
                $data['result'] = mb_strtolower($_POST['text']);
                break;

            case 'uppercase':
                $data['result'] = mb_strtoupper($_POST['text']);
                break;

            case 'sentencecase':
                $data['result'] = ucfirst(mb_strtolower($_POST['text']));
                break;

            case 'camelcase':
                $words = explode(' ', $_POST['text']);

                $pascalcase_words = array_map(function($word) {
                    return ucfirst($word);
                }, $words);

                $pascalcase = implode($pascalcase_words);

                $data['result'] = lcfirst($pascalcase);
                break;

            case 'pascalcase':
                $words = explode(' ', string_filter_alphanumeric($_POST['text']));

                $pascalcase_words = array_map(function($word) {
                    return ucfirst($word);
                }, $words);

                $pascalcase = implode($pascalcase_words);

                $data['result'] = $pascalcase;
                break;

            case 'capitalcase':
                $data['result'] = ucwords($_POST['text']);
                break;

            case 'constantcase':
                $data['result'] = mb_strtoupper(str_replace(' ', '_', trim(string_filter_alphanumeric($_POST['text']))));
                break;

            case 'dotcase':
                $data['result'] = mb_strtolower(str_replace(' ', '.', trim(string_filter_alphanumeric($_POST['text']))));
                break;

            case 'snakecase':
                $data['result'] = mb_strtolower(str_replace(' ', '_', trim(string_filter_alphanumeric($_POST['text']))));
                break;

            case 'paramcase':
                $data['result'] = mb_strtolower(str_replace(' ', '-', trim(string_filter_alphanumeric($_POST['text']))));
                break;
        }


    }
}

$values = [
    'text' => $_POST['text'] ?? null,
    'type' => $_POST['type'] ?? null,
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
                    <label for="text"><i class="fa fa-fw fa-paragraph fa-sm text-muted mr-1"></i> Text</label>
                    <textarea id="text" name="text" class="form-control" required="required"><?= $data['values']['text'] ?></textarea>
                </div>

                <div class="form-group">
                    <label for="type"><i class="fa fa-fw fa-sm fa-fingerprint text-muted mr-1"></i> Type</label>
                    <select id="type" name="type" class="form-control" required="required">
                        <option value="lowercase" <?= $data['values']['type'] == 'lowercase' ? 'selected="selected"' : null ?>>lowercase</option>
                        <option value="uppercase" <?= $data['values']['type'] == 'uppercase' ? 'selected="selected"' : null ?>>UPPERCASE</option>
                        <option value="sentencecase" <?= $data['values']['type'] == 'sentencecase' ? 'selected="selected"' : null ?>>Sentence case</option>
                        <option value="camelcase" <?= $data['values']['type'] == 'camelcase' ? 'selected="selected"' : null ?>>camelCase</option>
                        <option value="pascalcase" <?= $data['values']['type'] == 'pascalcase' ? 'selected="selected"' : null ?>>PascalCase</option>
                        <option value="capitalcase" <?= $data['values']['type'] == 'capitalcase' ? 'selected="selected"' : null ?>>capitalcase</option>
                        <option value="constantcase" <?= $data['values']['type'] == 'constantcase' ? 'selected="selected"' : null ?>>CONSTANT_CASE</option>
                        <option value="dotcase" <?= $data['values']['type'] == 'dotcase' ? 'selected="selected"' : null ?>>dot.case</option>
                        <option value="snakecase" <?= $data['values']['type'] == 'snakecase' ? 'selected="selected"' : null ?>>snake_case</option>
                        <option value="paramcase" <?= $data['values']['type'] == 'paramcase' ? 'selected="selected"' : null ?>>param-case</option>
                    </select>
                </div>

                <button type="submit" name="submit" class="btn btn-block btn-primary">Submit</button>
            </form>

        </div>
    </div>

    <?php if(isset($_POST['submit'])): ?>
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
                        <textarea id="result" class="form-control"><?= $data['result'] ?></textarea>
                    </div>

                </div>
            </div>

        </div>
    <?php endif ?>


    <?php include('partials/clipboard_js.php'); ?>