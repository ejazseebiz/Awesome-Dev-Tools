<?php 
$data = [];

if(!empty($_POST)) {
    $_POST['number'] = (int) $_POST['number'];

    /* Check for any errors */
    $required_fields = ['language'];
    foreach($required_fields as $field) {
        if(!isset($_POST[$field]) || (isset($_POST[$field]) && empty($_POST[$field]) && $_POST[$field] != '0')) {
            echo "Field is empty";
        }
    }

    // if(!\Altum\Csrf::check()) {
    //     Alerts::add_error(l('global.error_message.invalid_csrf_token'));
    // }


    require_once('vendors/kwn/number-to-words/src/NumberTransformer/NumberTransformer.php');
    // require_once('vendors/kwn/number-to-words/src/NumberTransformer/GenericNumberTransformer.php');

    // require_once('vendors/kwn/number-to-words/src/NumberTransformer/NumberTransformerBuilder.php');

    // require_once('vendors/kwn/number-to-words/src/Language/ExponentGetter.php');

    // require_once('vendors/kwn/number-to-words/src/Language/English/EnglishExponentGetter.php');

    // require_once('vendors/kwn/number-to-words/src/Language/TripletTransformer.php');

    // require_once('vendors/kwn/number-to-words/src/Language/English/EnglishTripletTransformer.php');

    // require_once('vendors/kwn/number-to-words/src/Service/NumberToTripletsConverter.php');
    // require_once('vendors/kwn/number-to-words/src/Language/Dictionary.php');
    // require_once('vendors/kwn/number-to-words/src/Language/English/EnglishDictionary.php');
    // require_once('vendors/kwn/number-to-words/src/NumberTransformer/NumberTransformer.php');

    // require_once('vendors/kwn/number-to-words/src/NumberTransformer/EnglishNumberTransformer.php');

    // require_once('vendors/kwn/number-to-words/src/Concerns/ManagesNumberTransformers.php');
    require_once('vendors/kwn/number-to-words/src/Concerns/ManagesCurrencyTransformers.php');
    require_once('vendors/kwn/number-to-words/src/NumberToWords.php');
    if(!empty($_POST && empty($errors))) { 
        $data['result'] = \NumberToWords\NumberToWords::transformNumber($_POST['language'], $_POST['number']);
    }
}

$values = [
    'number' => $_POST['number'] ?? 125,
    'language' => $_POST['language'] ?? 'en',
    'languages' => [
        'al' => 'Albanian',
        'ar' => 'Arabic',
        'az' => 'Azerbaijani',
        'fr_BE' => 'Belgian French',
        'pt_BR' => 'Brazilian Portuguese',
        'cs' => 'Czech',
        'dk' => 'Danish',
        'nl' => 'Dutch',
        'en' => 'English',
        'et' => 'Estonian',
        'ka' => 'Georgian',
        'de' => 'German',
        'fr' => 'French',
        'hu' => 'Hungarian',
        'id' => 'Indonesian',
        'it' => 'Italian',
        'lt' => 'Lithuanian',
        'lv' => 'Latvian',
        'mk' => 'Macedonian',
        'ms' => 'Malay',
        'fa' => 'Persian',
        'pl' => 'Polish',
        'ro' => 'Romanian',
        'sk' => 'Slovak',
        'es' => 'Spanish',
        'ru' => 'Russian',
        'sv' => 'Swedish',
        'tr' => 'Turkish',
        'tk' => 'Turkmen',
        'ua' => 'Ukrainian',
        'yo' => 'Yoruba',
    ]
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

                <div class="form-group">
                    <label for="language"><i class="fa fa-fw fa-sm fa-language text-muted mr-1"></i> Language</label>
                    <select id="language" name="language" class="form-control" required="required">
                        <?php foreach($data['values']['languages'] as $key => $value): ?>
                        <option value="<?= $key ?>" <?= $data['values']['language'] == $key ? 'selected="selected"' : null ?>><?= $value ?></option>
                        <?php endforeach ?>
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