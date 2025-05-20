<?php 
include('helper/strings.php');
include('helper/66uptime.php');
include('helper/others.php');
$data = [];
$errors = [];
        if(!empty($_POST)) {
            $_POST['host'] = input_clean($_POST['host']);

            if(filter_var($_POST['host'], FILTER_VALIDATE_URL)) {
                $_POST['host'] = parse_url($_POST['host'], PHP_URL_HOST);
            }

            /* Check for any errors */
            $required_fields = ['host'];
            foreach($required_fields as $field) {
                if(!isset($_POST[$field]) || (isset($_POST[$field]) && empty($_POST[$field]) && $_POST[$field] != '0')) {
                    echo "Field is empty";
                }
            }

            // if(!\Altum\Csrf::check()) {
            //     Alerts::add_error(l('global.error_message.invalid_csrf_token'));
            // }

            /* Check for an SSL certificate */
            $certificate = get_website_certificate('https://' . $_POST['host']);

            if(!$certificate) {
                $errors['invalid'] = 'We could not retrieve any details for your given host.';
            }

            if(!empty($_POST && empty($errors))) { 

                /* Create the new SSL object */
                $ssl = [
                    'organization' => $certificate['issuer']['O'],
                    'country' => $certificate['issuer']['C'],
                    'common_name' => $certificate['issuer']['CN'],
                    'start_datetime' => (new \DateTime())->setTimestamp($certificate['validFrom_time_t'])->format('Y-m-d H:i:s'),
                    'end_datetime' => (new \DateTime())->setTimestamp($certificate['validTo_time_t'])->format('Y-m-d H:i:s'),
                ];

                $data['result'] = $ssl;

            }
        }

        $values = [
            'host' => $_POST['host'] ?? '',
        ];

        /* Prepare the View */
        $data['values'] = $values;

?>




    <div class="card">
        <div class="card-body">

            <form action="" method="post" role="form">
                <input type="hidden" name="token" value="" />

                <div class="form-group">
                    <label for="host"><i class="fa fa-fw fa-globe fa-sm text-muted mr-1"></i> Host</label>
                    <input type="text" id="host" name="host" class="form-control" value="<?= $data['values']['host'] ?>" required="required" />
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

                    <?php if(isset($data['result']['country'])): ?>
                        <tr>
                            <td class="font-weight-bold">
                            Country
                            </td>
                            <td class="text-nowrap">
                                <img src="<?= ASSETSPATH . 'images/countries/' . mb_strtolower($data['result']['country']) . '.svg' ?>" class="img-fluid icon-favicon mr-1" width="50" /> <?= get_country_from_country_code($data['result']['country']) ?>
                            </td>
                        </tr>
                    <?php endif ?>

                    <?php if(isset($data['result']['organization'])): ?>
                        <tr>
                            <td class="font-weight-bold">
                            Organization
                            </td>
                            <td class="text-nowrap">
                                <?= $data['result']['organization'] ?>
                            </td>
                        </tr>
                    <?php endif ?>

                    <?php if(isset($data['result']['common_name'])): ?>
                        <tr>
                            <td class="font-weight-bold">
                            Common name	
                            </td>
                            <td class="text-nowrap">
                                <?= $data['result']['common_name'] ?>
                            </td>
                        </tr>
                    <?php endif ?>

                    <?php if(isset($data['result']['start_datetime'])): ?>
                        <tr>
                            <td class="font-weight-bold">
                            Issued on	
                            </td>
                            <td class="text-nowrap">

                                <?php
                                $date = date_create($data['result']['start_datetime']);
                                echo date_format($date, 'm M, Y (Y-m-d H:i:s)');
                                ?>

                            </td>
                        </tr>
                    <?php endif ?>

                    <?php if(isset($data['result']['end_datetime'])): ?>
                        <tr>
                            <td class="font-weight-bold">
                            Expiring on	
                            </td>
                            <td class="text-nowrap">
                            <?php
                                $date = date_create($data['result']['end_datetime']);
                                echo date_format($date, 'm M, Y (Y-m-d H:i:s)');
                                ?>

                            </td>
                        </tr>
                    <?php endif ?>

                    </tbody>
                </table>
            </div>
        </div>
    <?php endif ?>

    <?php include('partials/clipboard_js.php'); ?>

