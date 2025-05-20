<?php 
include('helper/LoremIpsum.php');
$data = [];

if(!empty($_POST)) {
    $_POST['amount'] = (int) $_POST['amount'];
    $_POST['type'] = in_array($_POST['type'], ['paragraphs', 'sentences', 'words']) ? $_POST['type'] : 'paragraphs';

    /* Check for any errors */
    $required_fields = ['amount'];
    foreach($required_fields as $field) {
        if(!isset($_POST[$field]) || (isset($_POST[$field]) && empty($_POST[$field]) && $_POST[$field] != '0')) {
            echo "Field is empty";
        }
    }

    // if(!\Altum\Csrf::check()) {
    //     Alerts::add_error(l('global.error_message.invalid_csrf_token'));
    // }

    if(!empty($_POST && empty($errors))) { 

        $lipsum = new \joshtronic\LoremIpsum();

        switch($_POST['type']) {
            case 'paragraphs':
                $data['result'] = $lipsum->paragraphs($_POST['amount']);
                break;

            case 'sentences':
                $data['result'] = $lipsum->sentences($_POST['amount']);
                break;

            case 'words':
                $data['result'] = $lipsum->words($_POST['amount']);
                break;
        }

    }
}

$values = [
    'amount' => $_POST['amount'] ?? 1,
    'type' => $_POST['type'] ?? null,
];

/* Prepare the View */
$data['values'] = $values;
?>



    <div class="card">
        <div class="card-body">

            <form action="" method="post" role="form">
                <input type="hidden" name="token" value="" />


                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="amount"><i class="fa fa-fw fa-sort-numeric-up fa-sm text-muted mr-1"></i> Amount</label>
                            <input type="number" min="1" id="amount" name="amount" class="form-control" value="<?= $data['values']['amount'] ?>" required="required" />
                            
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="form-group">
                            <label for="type"><i class="fa fa-fw fa-sm fa-fingerprint text-muted mr-1"></i> Type</label>
                            <select id="type" name="type" class="form-control" required="required">
                                <option value="paragraphs" <?= $data['values']['type'] == 'paragraphs' ? 'selected="selected"' : null ?>>Paragraphs</option>
                                <option value="sentences" <?= $data['values']['type'] == 'sentences' ? 'selected="selected"' : null ?>>Sentences</option>
                                <option value="words" <?= $data['values']['type'] == 'words' ? 'selected="selected"' : null ?>>Words</option>
                            </select>
                        </div>
                    </div>
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
                            <label for="result"><?= $data['values']['type'] ?></label>
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