<?php
include('helper/strings.php');
$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );
$data = [];
if(!empty($_POST)) {

    $_POST['year_val'] = (int) $_POST['year_val'];
    $_POST['month_val'] = (int) $_POST['month_val'];
    $_POST['day_val'] = (int) $_POST['day_val'];
    $_POST['hour_val'] = (int) $_POST['hour_val'];
    $_POST['minute_val'] = (int) $_POST['minute_val'];
    $_POST['second_val'] = (int) $_POST['second_val'];
    $_POST['timezone']  = in_array($_POST['timezone'], \DateTimeZone::listIdentifiers()) ? query_clean($_POST['timezone']) : 'UTC';

    /* Check for any errors */
    $required_fields = ['year_val', 'month_val', 'day_val', 'hour_val', 'minute_val', 'second_val', 'timezone'];
    foreach($required_fields as $field) {
        if(!isset($_POST[$field]) || (isset($_POST[$field]) && empty($_POST[$field]) && $_POST[$field] != '0')) {
            echo "Field is empty";
        }
    }

    // if(!\Altum\Csrf::check()) {
    //     Alerts::add_error(l('global.error_message.invalid_csrf_token'));
    // }

    if(!empty($_POST && empty($errors))) { 
        $datetime = (new \DateTime())->setTimezone(new \DateTimeZone($_POST['timezone']))->setDate($_POST['year_val'], $_POST['month_val'], $_POST['day_val'])->setTime($_POST['hour_val'], $_POST['minute_val'], $_POST['second_val']);
        $data['result'] = $datetime->getTimestamp();
    }
}

$values = [
    'year_val' => $_POST['year_val'] ?? date('Y'),
    'month_val' => $_POST['month_val'] ?? date('m'),
    'day_val' => $_POST['day_val'] ?? date('d'),
    'hour_val' => $_POST['hour_val'] ?? date('H'),
    'minute_val' => $_POST['minute_val'] ?? date('i'),
    'second_val' => $_POST['second_val'] ?? date('s'),
    'timezone' => $_POST['timezone'] ?? 'UTC',
];

/* Prepare the View */
$data['values'] = $values;

?>

    <div class="card">
        <div class="card-body">

            <form action="" method="post" role="form" enctype="multipart/form-data">
                <input type="hidden" name="token" value="" />

                <div class="row">
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label for="year_val">Year_val</label>
                            <input type="number" id="year_val" name="year_val" class="form-control" value="<?= $data['values']['year_val'] ?>" required="required" />
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="form-group">
                            <label for="month_val">Month_val</label>
                            <input type="number" id="month_val" name="month_val" class="form-control" value="<?= $data['values']['month_val'] ?>" required="required" />
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="form-group">
                            <label for="day_val">Day_val</label>
                            <input type="number" id="day_val" name="day_val" class="form-control" value="<?= $data['values']['day_val'] ?>" required="required" />
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="form-group">
                            <label for="hour_val">Hour_val</label>
                            <input type="number" id="hour_val" name="hour_val" class="form-control" value="<?= $data['values']['hour_val'] ?>" required="required" />
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="form-group">
                            <label for="minute_val">Minute_val</label>
                            <input type="number" id="minute_val" name="minute_val" class="form-control" value="<?= $data['values']['minute_val'] ?>" required="required" />
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="form-group">
                            <label for="second_val">Second_val</label>
                            <input type="number" id="second_val" name="second_val" class="form-control" value="<?= $data['values']['second_val'] ?>" required="required" />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="timezone">Timezone</label>
                    <select id="timezone" name="timezone" class="form-control">
                        <?php 
                         foreach(DateTimeZone::listIdentifiers() as $timezone) echo '<option value="' . $timezone . '" ' . ($data['values']['timezone'] == $timezone ? 'selected="selected"' : null) . '>' . $timezone . '</option>' 
                        ?>
                    </select>
                </div>

                <button type="submit" name="submit" class="btn btn-block btn-primary" data-is-ajax>Submit</button>
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
                                        class="btn btn-link text-second_valary"
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