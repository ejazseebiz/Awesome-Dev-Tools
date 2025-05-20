<?php 

$data = [];
$errors = [];

        if(!empty($_POST)) {
            $_POST['url'] = filter_var($_POST['url'], FILTER_SANITIZE_URL);

            /* Check for any errors */
            $required_fields = ['url'];
            foreach($required_fields as $field) {
                if(!isset($_POST[$field]) || (isset($_POST[$field]) && empty($_POST[$field]) && $_POST[$field] != '0')) {
                    echo "Field is empty";
                }
            }

            // if(!\Altum\Csrf::check()) {
            //     Alerts::add_error(l('global.error_message.invalid_csrf_token'));
            // }

            /* Get the URL source */
            // require_once('vendors/mashape/unirest-php/src/Unirest.php');
            require_once('vendors/autoload_namespaces.php');
            
            $url = 'http://webcache.googleusercontent.com/search?hl=en&q=cache:' . urlencode($_POST['url']) . '&strip=0&vwsrc=1';
            try {
                $response = \Unirest\Request::get($url, [
                    'User-Agent' => 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:38.0) Gecko/20100101 Firefox/38.0'
                ]);
            } catch (\Exception $exception) {
                // Alerts::add_field_error('url', l('tools.google_cache_checker.error_message'));
                $errors['invalid'] = "Invalid Page URL";
            }

            if(!empty($_POST && empty($errors))) { 
                /* Get details from the google query result */
                preg_match('/It is a snapshot of the page as it appeared on ([^\.]+)\./i', $response->raw_body, $matches);
                // echo "HHHHHHHH";
                // print_r($response->raw_body);
                $data['result'] = empty($matches) ? false : $matches[1];
            }
        }

        $values = [
            'url' => $_POST['url'] ?? null,
        ];

        /* Prepare the View */
        $data['values'] = $values;
?>



    <div class="card">
        <div class="card-body">

            <form action="" method="post" role="form">
                <input type="hidden" name="token" value="" />

                <div class="form-group">
                    <label for="url"><i class="fa fa-fw fa-link fa-sm text-muted mr-1"></i> URL</label>
                    <input type="url" id="url" name="url" class="form-control" value="<?= $data['values']['url'] ?>" required="required" />
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
                            Result
                        </td>
                        <td class="text-nowrap <?= $data['result'] ? 'text-success' : 'text-danger'; ?>">
                            <?= $data['result'] ? 'This url is cached:- ' . $data['result'] : 'Not Cached' ?>
            
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif ?>


<?php include('partials/clipboard_js.php'); ?>


