<?php 
require_once('vendors/autoload_namespaces.php');
include('helper/others.php');
include('helper/strings.php');
include('helper/66uptime.php');
 $data = [];

 if(!empty($_POST)) {
     $_POST['type'] = in_array($_POST['type'], ['website', 'ping', 'port']) ? input_clean($_POST['type']) : 'website';
     $_POST['target'] = input_clean($_POST['target']);
     $_POST['port'] = isset($_POST['port']) ? (int) $_POST['port'] : 0;

     /* Check for any errors */
     $required_fields = ['target'];
     foreach($required_fields as $field) {
         if(!isset($_POST[$field]) || (isset($_POST[$field]) && empty($_POST[$field]) && $_POST[$field] != '0')) {
            echo "Field is empty";
         }
     }

    //  if(!\Altum\Csrf::check()) {
    //      Alerts::add_error(l('global.error_message.invalid_csrf_token'));
    //  }

//            if(empty($whois)) {
//                Alerts::add_field_error('domain_name', l('tools.whois_lookup.error_message'));
//            }

if(!empty($_POST && empty($errors))) { 

         $target = (new \StdClass());
         $target->type = $_POST['type'];
         $target->target = $_POST['target'];
         $target->port = $_POST['port'] ?? 0;
         $target->ping_servers_ids = [1];
         $target->settings = (new \StdClass());
         $target->settings->timeout_seconds = 5;

         $check = ping($target);

         $data['result'] = $check;

     }
 }

 $values = [
     'type' => $_POST['type'] ?? '',
     'target' => $_POST['target'] ?? '',
     'port' => $_POST['port'] ?? '',
 ];

 /* Prepare the View */
 $data['values'] = $values;
?>




    <div class="card">
        <div class="card-body">

            <form action="" method="post" role="form">
                <input type="hidden" name="token" value="" />

                <div class="form-group">
                    <label for="type"><i class="fa fa-fw fa-sm fa-fingerprint text-muted mr-1"></i> Ping Protocol</label>
                    <select id="type" name="type" class="form-control" required="required">
                        <option value="website" <?= $data['values']['type'] == 'website' ? 'selected="selected"' : null ?>>HTTP(s)</option>
                        <option value="ping" <?= $data['values']['type'] == 'ping' ? 'selected="selected"' : null ?>>Ping (ICMP)</option>
                        <option value="port" <?= $data['values']['type'] == 'port' ? 'selected="selected"' : null ?>>Host / Port</option>
                    </select>
                    <small id="type_website_help" data-type="website" class="form-text text-muted">Ideal for monitoring websites, APIs and web services.</small id=type_help>
                    <small id="type_ping_help" data-type="ping" class="form-text text-muted">Ideal for monitoring a server.</small id=type_help>
                    <small id="type_port_help" data-type="port" class="form-text text-muted">Ideal for monitoring databases, POP or SMTP servers.</small>
                </div>

                <div class="form-group" data-type="website">
                    <label for="target_website_url"><i class="fa fa-fw fa-sm fa-globe text-muted mr-1"></i> URL</label>
                    <input type="text" id="target_website_url" name="target" class="form-control" value="<?= $data['values']['target'] ?>" required="required" />
                    
                </div>

                <div class="form-group" data-type="ping">
                    <label for="target_ping_host"><i class="fa fa-fw fa-sm fa-globe text-muted mr-1"></i>  Host</label>
                    <input type="text" id="target_ping_host" name="target" class="form-control" value="<?= $data['values']['target'] ?>" required="required" />
                </div>

                <div class="row" data-type="port">
                    <div class="col-lg-3">
                        <div class="form-group" data-type="port">
                            <label for="target_port_host"><i class="fa fa-fw fa-sm fa-globe text-muted mr-1"></i>  Host</label>
                            <input type="text" id="target_port_host" name="target" class="form-control" value="<?= $data['values']['target'] ?>" required="required" />
                        </div>
                    </div>

                    <div class="col-lg-9">
                        <div class="form-group" data-type="port">
                            <label for="target_port_port"><i class="fa fa-fw fa-sm fa-dna text-muted mr-1"></i> Port</label>
                            <input type="text" id="target_port_port" name="port" class="form-control" value="<?= $data['values']['port'] ?>" required="required" />
                        </div>
                    </div>
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

                    <?php if(isset($data['result']['ping_server_id'])): ?>
                        <tr>
                            <td class="font-weight-bold">
                                <?= l('tools.ping.result.ping_server_id') ?>
                            </td>
                            <td class="text-nowrap">
                                <img src="<?= ASSETS_FULL_URL . 'images/countries/' . mb_strtolower($data->ping_servers[$data['result']['ping_server_id']]->country_code) . '.svg' ?>" class="img-fluid icon-favicon mr-1" /> <?= get_country_from_country_code($data->ping_servers[$data['result']['ping_server_id']]->country_code). ', ' . $data->ping_servers[$data['result']['ping_server_id']]->city_name ?>
                            </td>
                        </tr>
                    <?php endif ?>

                    <?php if(isset($data['result']['is_ok'])): ?>
                        <tr>
                            <td class="font-weight-bold">
                            Status
                            </td>
                            <td class="text-nowrap">
                                <?php if($data['result']['is_ok']): ?>
                                    <i class="fa fa-fw fa-sm fa-check-circle text-success"></i> UP
                                <?php else: ?>
                                    <i class="fa fa-fw fa-sm fa-times-circle text-danger"></i> DOWN
                                <?php endif ?>
                            </td>
                        </tr>
                    <?php endif ?>

                    <?php if($data['result']['is_ok']): ?>
                        <?php if(isset($data['result']['response_time'])): ?>
                            <tr>
                                <td class="font-weight-bold">
                                Response time	
                                </td>
                                <td class="text-nowrap">
                                    <?= display_response_time($data['result']['response_time']) ?>
                                </td>
                            </tr>
                        <?php endif ?>

                        <?php if(isset($data['result']['response_status_code'])): ?>
                            <tr>
                                <td class="font-weight-bold">
                                Response status code
                                </td>
                                <td class="text-nowrap">
                                    <?= $data['result']['response_status_code'] ?>
                                </td>
                            </tr>
                        <?php endif ?>
                    <?php else: ?>
                        <?php if(isset($data['result']['error'])): ?>
                            <tr>
                                <td class="font-weight-bold">
                                Error
                                </td>
                                <td class="text-nowrap">
                                    <?= $data['result']['error']['message'] ?>
                                </td>
                            </tr>
                        <?php endif ?>
                    <?php endif ?>

                    </tbody>
                </table>
            </div>
        </div>
    <?php endif ?>

    <?php include('partials/clipboard_js.php'); ?>
<?php ob_start() ?>
<script>
    'use strict';

    /* Type handler */
    let type_handler = () => {
        let type = document.querySelector('select[name="type"]').value;

        document.querySelectorAll(`[data-type]:not([data-type="${type}"])`).forEach(element => {
            element.classList.add('d-none');

            element.querySelector('input[name="target"],input[name="port"]') && element.querySelector('input[name="target"],input[name="port"]').setAttribute('disabled', 'disabled');
            element.querySelector('input[name="target"],input[name="port"]') && element.querySelector('input[name="target"],input[name="port"]').removeAttribute('required');
        });

        document.querySelectorAll(`[data-type="${type}"]`).forEach(element => {
            element.classList.remove('d-none');

            element.querySelector('input[name="target"],input[name="port"]') && element.querySelector('input[name="target"],input[name="port"]').removeAttribute('disabled');
            element.querySelector('input[name="target"],input[name="port"]') && element.querySelector('input[name="target"],input[name="port"]').setAttribute('required', 'required');
        });
    }

    type_handler();

    document.querySelector('select[name="type"]') && document.querySelector('select[name="type"]').addEventListener('change', type_handler);
</script>


<?php include('partials/clipboard_js.php'); ?>

