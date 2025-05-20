<?php 
include('helper/others.php');
include('helper/strings.php');

$data = [];

        if(!empty($_POST)) {
            $_POST['ip'] = input_clean($_POST['ip']);

            /* Check for any errors */
            $required_fields = ['ip'];
            foreach($required_fields as $field) {
                if(!isset($_POST[$field]) || (isset($_POST[$field]) && empty($_POST[$field]) && $_POST[$field] != '0')) {
                    echo "Field is empty";
                }
            }

            // if(!\Altum\Csrf::check()) {
            //     Alerts::add_error(l('global.error_message.invalid_csrf_token'));
            // }

            require_once('vendors/maxmind-db/reader/src/MaxMind/Db/Reader.php');
            require_once('vendors/maxmind-db/reader/src/MaxMind/Db/Reader/Decoder.php');
            require_once('vendors/maxmind-db/reader/src/MaxMind/Db/Reader/InvalidDatabaseException.php');
            require_once('vendors/maxmind-db/reader/src/MaxMind/Db/Reader/Metadata.php');
            require_once('vendors/maxmind-db/reader/src/MaxMind/Db/Reader/Util.php');

            // require_once('vendors/maxmind-db/reader/autoload.php');
            // use MaxMind\Db\Reader;
            // use GeoIp2\Database\Reader;
            // use GeoIp2\WebService\Client;

            use MaxMind\Db\Reader;

            if(!filter_var($_POST['ip'], FILTER_VALIDATE_IP)) {
                Alerts::add_field_error('ip', l('tools.ip_lookup.error_message'));
            }

            try {
                $maxmind = (new Reader('includes/GeoLite2-City.mmdb'))->get($_POST['ip']);
            } catch(\Exception $exception) {
                Alerts::add_field_error('ip', l('tools.ip_lookup.error_message'));
            }

            if(!$maxmind) {
                Alerts::add_field_error('ip', l('tools.ip_lookup.error_message'));
            }

            if(!Alerts::has_field_errors() && !Alerts::has_errors()) {
                $data['result'] = $maxmind;
            }
        }

        $values = [
            'ip' => $_POST['ip'] ?? get_ip(),
        ];

        /* Prepare the View */
        $data['values'] = $values;

?>

    <div class="card">
        <div class="card-body">

            <form action="" method="post" role="form">
                <input type="hidden" name="token" value="" />

                <div class="form-group">
                    <label for="ip"><i class="fa fa-fw fa-search-location fa-sm text-muted mr-1"></i> IP</label>
                    <input type="text" id="ip" name="ip" class="form-control" value="<?= $data['values']['ip'] ?>" required="required" />
                    
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
                    <?php if(isset($data['result']['continent'])): ?>
                        <tr>
                            <td class="font-weight-bold">
                            Continent
                            </td>
                            <td class="text-nowrap">
                                <?= $data['result']['continent']['names']['en'] ?>
                            </td>
                        </tr>
                    <?php endif ?>

                    <?php if(isset($data['result']['country'])): ?>
                        <tr>
                            <td class="font-weight-bold">
                            Country
                            </td>
                            <td class="text-nowrap">
                                <img src="<?= ASSETS_FULL_URL . 'images/countries/' . mb_strtolower($data['result']['country']['iso_code']) . '.svg' ?>" class="img-fluid icon-favicon mr-1" /> <?= get_country_from_country_code($data['result']['country']['iso_code']) ?>
                            </td>
                        </tr>
                    <?php endif ?>

                    <?php if(isset($data['result']['city'])): ?>
                        <tr>
                            <td class="font-weight-bold">
                            City
                            </td>
                            <td class="text-nowrap">
                                <?= $data['result']['city']['names']['en'] ?>
                            </td>
                        </tr>
                    <?php endif ?>

                    <?php if(isset($data['result']['location'])): ?>
                        <tr>
                            <td class="font-weight-bold">
                            Latitude
                            </td>
                            <td class="text-nowrap">
                                <?= $data['result']['location']['latitude'] ?>
                            </td>
                        </tr>

                        <tr>
                            <td class="font-weight-bold">
                            Longitude
                            </td>
                            <td class="text-nowrap">
                                <?= $data['result']['location']['longitude'] ?>
                            </td>
                        </tr>

                        <tr>
                            <td class="font-weight-bold">
                            Timezone
                            </td>
                            <td class="text-nowrap">
                                <?= $data['result']['location']['time_zone'] ?>
                            </td>
                        </tr>
                    <?php endif ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif ?>

    <?php include('partials/clipboard_js.php'); ?>
