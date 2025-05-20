<?php 
include('helper/strings.php');
$data = [];
$errors = [];
if(!empty($_POST)) {
    $_POST['color'] = input_clean($_POST['color']);

    /* Check for any errors */
    $required_fields = ['color'];
    foreach($required_fields as $field) {
        if(!isset($_POST[$field]) || (isset($_POST[$field]) && empty($_POST[$field]) && $_POST[$field] != '0')) {
            echo "Field is empty";
        }
    }

    // if(!\Altum\Csrf::check()) {
    //     Alerts::add_error(l('global.error_message.invalid_csrf_token'));
    // }

    $type = null;

    if(mb_substr($_POST['color'], 0, strlen('#')) === '#') {
        $type = 'hex';
    }

    if(mb_substr($_POST['color'], 0, strlen('#')) === '#' && mb_strlen($_POST['color']) > 7) {
        $type = 'hexa';
    }

    foreach(['rgb', 'rgba', 'hsl', 'hsla', 'hsv'] as $color_type) {
        if(mb_substr($_POST['color'], 0, strlen($color_type)) === $color_type) {
            $type = $color_type;
        }
    }

    if(!$type || ($type && $type != 'hexa')) {
        $errors['invalid'] = 'No valid color format was detected.';
    } else {
        try {
            require_once('vendors/ozdemirburak/iris/src/autoload.php');
            $class = '\OzdemirBurak\Iris\Color\\' . ucfirst($type);
            $color = new $class($_POST['color']);
        } catch (\Exception $exception) {
            $errors['invalid'] = 'No valid color format was detected.';
        }
    }

    if(!empty($_POST && empty($errors))) {

        $data['result']['hex'] = $color->toHex();
        $data['result']['hexa'] = $color->toHexa();
        $data['result']['rgb'] = $color->toRgb();
        $data['result']['rgba'] = $color->toRgba();
        $data['result']['hsv'] = $color->toHsv();
        $data['result']['hsl'] = $color->toHsl();
        $data['result']['hsla'] = $color->toHsla();

    }
}

$values = [
    'color' => $_POST['color'] ?? null,
];

/* Prepare the View */
$data['values'] = $values;
?>


    <div class="card">
        <div class="card-body">

            <form action="" method="post" role="form">
                <input type="hidden" name="token" value="" />

                <div class="form-group">
                    <label for="color"><i class="fa fa-fw fa-palette fa-sm text-muted mr-1"></i> Color</label>
                    <input type="text" id="color" name="color" class="form-control" value="<?= $data['values']['color'] ?>" required="required" />
                    <p><?php echo $errors['invalid'] ?? null; ?></p>
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
                            <i class="fa fa-palette fa-fw fa-sm mr-1"></i> Color
                        </td>
                        <td style="background: <?= $data['result']['hex'] ?>">
                        </td>
                        <td style="background: <?= $data['result']['hex'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">
                            HSL
                        </td>
                        <td class="text-nowrap">
                            <?= $data['result']['hsl'] ?>
                        </td>
                        <td>
                            <div class="d-flex justify-content-end">
                                <button
                                        type="button"
                                        class="btn btn-link text-secondary"
                                        data-toggle="tooltip"
                                        title="clipboard_copy"
                                        aria-label="clipboard_copy"
                                        data-copy="clipboard_copy"
                                        data-copied="clipboard_copied"
                                        data-clipboard-text="<?= $data['result']['hsl'] ?>"
                                >
                                    <i class="fa fa-fw fa-sm fa-copy"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif ?>

    <?php include('partials/clipboard_js.php'); ?>