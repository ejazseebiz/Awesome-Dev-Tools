<?php
include('helper/strings.php');
$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );
$errors = [];
$data = [];

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

    $data['result'] = [];

    foreach([DNS_A, DNS_AAAA, DNS_CNAME, DNS_MX, DNS_NS, DNS_TXT, DNS_SOA, DNS_CAA] as $dns_type) {
        $dns_records = @dns_get_record($_POST['host'], $dns_type);

        if($dns_records) {
            foreach($dns_records as $dns_record) {
                if(!isset($data['result'][$dns_record['type']])) {
                    $data['result'][$dns_record['type']] = [$dns_record];
                } else {
                    $data['result'][$dns_record['type']][] = $dns_record;
                }
            }
        }
    }

    if(empty($data['result'])) {
        // Alerts::add_field_error('host', l('tools.dns_lookup.error_message'));
        $errors['invalid'] = "We could not retrieve any DNS records for your given host.";
    }

    // if(!empty($_POST && empty($errors))) {
    // }
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
        <div class="card">
                <div class="card-body">
            <?php if(isset($data['result']['A'])): ?>
                <div class="my-4">
                    <div class="d-flex align-items-center mb-2">
                        <h2 class="h5 m-0">A Records</h2>

                        <div class="ml-2">
                            <a href="https://www.cloudflare.com/learning/dns/dns-records/dns-a-record/" target="_blank">
                                <i class="fa fa-fw fa-info-circle text-muted"></i>
                            </a>
                        </div>
                    </div>

                    <div class="table-responsive table-custom-container">
                        <table class="table table-custom">
                            <thead>
                            <tr>
                                <th>Type</th>
                                <th>Host</th>
                                <th>TTL</th>
                                <th>IP</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($data['result']['A'] as $record): ?>

                                <tr>
                                    <td class="text-nowrap">
                                        <?= $record['type'] ?>
                                    </td>

                                    <td class="text-nowrap">
                                        <?= $record['host'] ?>
                                    </td>

                                    <td class="text-nowrap">
                                        <?= $record['ttl'] ?>
                                    </td>

                                    <td class="text-nowrap">
                                        <?= $record['ip'] ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endif ?>

            <?php if(isset($data['result']['AAAA'])): ?>
                <div class="my-4">
                    <div class="d-flex align-items-center mb-2">
                        <h2 class="h5 m-0">AAAA</h2>

                        <div class="ml-2">
                            <a href="https://www.cloudflare.com/learning/dns/dns-records/dns-aaaa-record/" target="_blank">
                                <i class="fa fa-fw fa-info-circle text-muted"></i>
                            </a>
                        </div>
                    </div>

                    <div class="table-responsive table-custom-container">
                        <table class="table table-custom">
                            <thead>
                            <tr>
                                <th>Type</th>
                                <th>Host</th>
                                <th>TTL</th>
                                <th>NS Records</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($data['result']['AAAA'] as $record): ?>

                                <tr>
                                    <td class="text-nowrap">
                                        <?= $record['type'] ?>
                                    </td>

                                    <td class="text-nowrap">
                                        <?= $record['host'] ?>
                                    </td>

                                    <td class="text-nowrap">
                                        <?= $record['ttl'] ?>
                                    </td>

                                    <td class="text-nowrap">
                                        <?= $record['ipv6'] ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endif ?>

            <?php if(isset($data['result']['CNAME'])): ?>
                <div class="my-4">
                    <div class="d-flex align-items-center mb-2">
                        <h2 class="h5 m-0">CNAME Records</h2>

                        <div class="ml-2">
                            <a href="https://www.cloudflare.com/learning/dns/dns-records/dns-cname-record/" target="_blank">
                                <i class="fa fa-fw fa-info-circle text-muted"></i>
                            </a>
                        </div>
                    </div>

                    <div class="table-responsive table-custom-container">
                        <table class="table table-custom">
                            <thead>
                            <tr>
                                <th>Type</th>
                                <th>Host</th>
                                <th>TTL</th>
                                <th>Target</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($data['result']['CNAME'] as $record): ?>

                                <tr>
                                    <td class="text-nowrap">
                                        <?= $record['type'] ?>
                                    </td>

                                    <td class="text-nowrap">
                                        <?= $record['host'] ?>
                                    </td>

                                    <td class="text-nowrap">
                                        <?= $record['ttl'] ?>
                                    </td>

                                    <td class="text-nowrap">
                                        <?= $record['target'] ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endif ?>

            <?php if(isset($data['result']['MX'])): ?>
                <div class="my-4">
                    <div class="d-flex align-items-center mb-2">
                        <h2 class="h5 m-0">SOA Records</h2>

                        <div class="ml-2">
                            <a href="https://www.cloudflare.com/learning/dns/dns-records/dns-mx-record/" target="_blank">
                                <i class="fa fa-fw fa-info-circle text-muted"></i>
                            </a>
                        </div>
                    </div>

                    <div class="table-responsive table-custom-container">
                        <table class="table table-custom">
                            <thead>
                            <tr>
                                <th>Type</th>
                                <th>Host</th>
                                <th>TTL</th>
                                <th>Priority</th>
                                <th>Target</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($data['result']['MX'] as $record): ?>

                                <tr>
                                    <td class="text-nowrap">
                                        <?= $record['type'] ?>
                                    </td>

                                    <td class="text-nowrap">
                                        <?= $record['host'] ?>
                                    </td>

                                    <td class="text-nowrap">
                                        <?= $record['ttl'] ?>
                                    </td>

                                    <td class="text-nowrap">
                                        <?= $record['pri'] ?>
                                    </td>

                                    <td class="text-nowrap">
                                        <?= $record['target'] ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endif ?>

            <?php if(isset($data['result']['NS'])): ?>
                <div class="my-4">
                    <div class="d-flex align-items-center mb-2">
                        <h2 class="h5 m-0">NS Records</h2>

                        <div class="ml-2">
                            <a href="https://www.cloudflare.com/learning/dns/dns-records/dns-ns-record/" target="_blank">
                                <i class="fa fa-fw fa-info-circle text-muted"></i>
                            </a>
                        </div>
                    </div>

                    <div class="table-responsive table-custom-container">
                        <table class="table table-custom">
                            <thead>
                            <tr>
                                <th>Type</th>
                                <th>Host</th>
                                <th>TTL</th>
                                <th>NS Records</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($data['result']['NS'] as $record): ?>

                                <tr>
                                    <td class="text-nowrap">
                                        <?= $record['type'] ?>
                                    </td>

                                    <td class="text-nowrap">
                                        <?= $record['host'] ?>
                                    </td>

                                    <td class="text-nowrap">
                                        <?= $record['ttl'] ?>
                                    </td>

                                    <td class="text-nowrap">
                                        <?= $record['target'] ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endif ?>

            <?php if(isset($data['result']['TXT'])): ?>
                <div class="my-4">
                    <div class="d-flex align-items-center mb-2">
                        <h2 class="h5 m-0">TXT Records</h2>

                        <div class="ml-2">
                            <a href="https://www.cloudflare.com/learning/dns/dns-records/dns-txt-record/" target="_blank">
                                <i class="fa fa-fw fa-info-circle text-muted"></i>
                            </a>
                        </div>
                    </div>

                    <div class="table-responsive table-custom-container">
                        <table class="table table-custom">
                            <thead>
                            <tr>
                                <th>Type</th>
                                <th>Host</th>
                                <th>TTL</th>
                                <th>Entries</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($data['result']['TXT'] as $record): ?>

                                <tr>
                                    <td class="text-nowrap">
                                        <?= $record['type'] ?>
                                    </td>

                                    <td class="text-nowrap">
                                        <?= $record['host'] ?>
                                    </td>

                                    <td class="text-nowrap">
                                        <?= $record['ttl'] ?>
                                    </td>

                                    <td class="text-nowrap">
                                        <?= $record['txt'] ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endif ?>

            <?php if(isset($data['result']['SOA'])): ?>
                <div class="my-4">
                    <div class="d-flex align-items-center mb-2">
                        <h2 class="h5 m-0">SOA Records</h2>

                        <div class="ml-2">
                            <a href="https://www.cloudflare.com/learning/dns/dns-records/dns-soa-record/" target="_blank">
                                <i class="fa fa-fw fa-info-circle text-muted"></i>
                            </a>
                        </div>
                    </div>

                    <div class="table-responsive table-custom-container">
                        <table class="table table-custom">
                            <thead>
                            <tr>
                                <th>Type</th>
                                <th>Host</th>
                                <th>TTL</th>
                                <th>MNAME</th>
                                <th>RNAME</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($data['result']['SOA'] as $record): ?>

                                <tr>
                                    <td class="text-nowrap">
                                        <?= $record['type'] ?>
                                    </td>

                                    <td class="text-nowrap">
                                        <?= $record['host'] ?>
                                    </td>

                                    <td class="text-nowrap">
                                        <?= $record['ttl'] ?>
                                    </td>

                                    <td class="text-nowrap">
                                        <?= $record['mname'] ?>
                                    </td>

                                    <td class="text-nowrap">
                                        <?= $record['rname'] ?>
                                    </td>

                                    <td class="text-nowrap">
                                        <div class="d-flex flex-column" style="flex-direction:column">
                                            <div class="row">
                                                <div class="col font-weight-bold">
                                                Serial
                                                </div>
                                                <div class="col">
                                                    <?= $record['serial'] ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col font-weight-bold">
                                                Retry
                                                </div>
                                                <div class="col">
                                                    <?= $record['refresh'] ?>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col font-weight-bold">
                                                Retry
                                                </div>
                                                <div class="col">
                                                    <?= $record['retry'] ?>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col font-weight-bold">
                                                Expire
                                                </div>
                                                <div class="col">
                                                    <?= $record['expire'] ?>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col font-weight-bold">
                                                Min. TTL

                                                </div>
                                                <div class="col text-truncate">
                                                    <?= $record['minimum-ttl'] ?>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endif ?>

            <?php if(isset($data['result']['CAA'])): ?>
                <div class="my-4">
                    <div class="d-flex align-items-center mb-2">
                        <h2 class="h5 m-0">CAA Records</h2>

                        <div class="ml-2">
                            <a href="https://www.cloudflare.com/learning/dns/dns-records/dns-caa-record/" target="_blank">
                                <i class="fa fa-fw fa-info-circle text-muted"></i>
                            </a>
                        </div>
                    </div>

                    <div class="table-responsive table-custom-container">
                        <table class="table table-custom">
                            <thead>
                            <tr>
                                <th>Type</th>
                                <th>Host</th>
                                <th>TTL</th>
                                <th>Flags</th>
                                <th>Tag</th>
                                <th>Value   </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($data['result']['CAA'] as $record): ?>

                                <tr>
                                    <td class="text-nowrap">
                                        <?= $record['type'] ?>
                                    </td>

                                    <td class="text-nowrap">
                                        <?= $record['host'] ?>
                                    </td>

                                    <td class="text-nowrap">
                                        <?= $record['ttl'] ?>
                                    </td>

                                    <td class="text-nowrap">
                                        <?= $record['flags'] ?>
                                    </td>

                                    <td class="text-nowrap">
                                        <?= $record['tag'] ?>
                                    </td>

                                    <td class="text-nowrap">
                                        <?= $record['value'] ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endif ?>

        </div>
        </div>
        </div>
    <?php endif ?>

    <?php include('partials/clipboard_js.php'); ?>