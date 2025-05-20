<?php 
include('helper/others.php');
$data = [];



echo SITE_URL;
function url($append = '') {
    // return SITE_URL . (\Altum\Language::$default_name != \Altum\Language::$name ? \Altum\Language::$code . '/' : null)  . $append;
    return SITE_URL ."/". $append;
}

if(!empty($_POST)) {
    $_POST['email'] = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    /* Check for any errors */
    $required_fields = ['email'];
    foreach($required_fields as $field) {
        if(!isset($_POST[$field]) || (isset($_POST[$field]) && empty($_POST[$field]) && $_POST[$field] != '0')) {
            echo "Field is empty";
        }
    }

    // if(!\Altum\Csrf::check()) {
    //     Alerts::add_error(l('global.error_message.invalid_csrf_token'));
    // }

    if(!empty($_POST && empty($errors))) { 
        $data['result'] = [];

        foreach(['mp', 'identicon', 'monsterid', 'wavatar', 'retro', 'robohash', 'blank'] as $key) {
            $data['result'][$key] = get_gravatar($_POST['email'], 2056, $key);
        }

    }
}

$values = [
    'email' => $_POST['email'] ?? null,
];

/* Prepare the View */
$data['values'] = $values;

?>




    <div class="card">
        <div class="card-body">

            <form action="" method="post" role="form">
                <input type="hidden" name="token" value="" />

                <div class="form-group">
                    <label for="email"><i class="fa fa-fw fa-envelope fa-sm text-muted mr-1"></i> Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="<?= $data['values']['email'] ?>" required="required" />
                </div>

                <button type="submit" name="submit" class="btn btn-block btn-primary">Submit</button>
            </form>

        </div>
    </div>

    <?php if(isset($data['result'])): ?>
        <div class="mt-4">
            <ul class="nav nav-pills mb-4" role="tablist">
                <?php foreach(['mp', 'identicon', 'monsterid', 'wavatar', 'retro', 'robohash', 'blank'] as $key): ?>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link <?= $key == 'mp' ? 'active' : null ?>" id="<?= 'tab_link_' . $key ?>" data-toggle="tab" href="<?= '#tab_container_' . $key ?>" role="tab" aria-controls="home">
                            <?= 'Result.' . $key ?>
                        </a>
                    </li>
                <?php endforeach ?>
            </ul>

            <div class="tab-content">
                <?php foreach(['mp', 'identicon', 'monsterid', 'wavatar', 'retro', 'robohash', 'blank'] as $key): ?>
                    <div class="tab-pane fade <?= $key == 'mp' ? 'show active' : null ?>" id="<?= 'tab_container_' . $key ?>" role="tabpanel" aria-labelledby="<?= 'tab_link_' . $key ?>">
                        <div class="card">
                            <div class="card-body">
                                <img src="<?= $data['result'][$key] ?>" class="img-fluid mb-3" />

                                <div class="form-group">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="<?= 'result_' . $key ?>"><?= 'Result.' . $key ?></label>
                                        <div>
                                            <a
                                                    href="<?= $data['result'][$key] . '&name=' . urlencode($key . '.jpg')  ?>"
                                                    target="_blank"
                                                    class="btn btn-link text-secondary"
                                                    data-toggle="tooltip"
                                                    title="Download"
                                                    download="<?= $key . '.jpg' ?>"
                                            >
                                                <i class="fa fa-fw fa-sm fa-download"></i>
                                            </a>

                                            <a
                                                    href="<?= $data['result'][$key] ?>"
                                                    target="_blank"
                                                    class="btn btn-link text-secondary"
                                                    data-toggle="tooltip"
                                                    title="Open"
                                            >
                                                <i class="fa fa-fw fa-sm fa-external-link-alt"></i>
                                            </a>

                                            <button
                                                    type="button"
                                                    class="btn btn-link text-secondary"
                                                    data-toggle="tooltip"
                                                    title="clipboard_copy"
                                                    aria-label="clipboard_copy"
                                                    data-copy="clipboard_copy"
                                                    data-copied="clipboard_copied"
                                                    data-clipboard-target="#<?= 'result_' . $key ?>"
                                                    data-clipboard-text
                                            >
                                                <i class="fa fa-fw fa-sm fa-copy"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <textarea id="<?= 'result_' . $key ?>" class="form-control"><?= $data['result'][$key] ?></textarea>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    <?php endif ?>

    <?php include('partials/clipboard_js.php'); ?>