<?php 
$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );
$data = [];

$values = [
    'text' => $_POST['text'] ?? null,
];

/* Prepare the View */
$data['values'] = $values;

?>

<script src="<?php echo $plug_fl; ?>js/custom.js"></script>


    <div class="card">
        <div class="card-body">

            <form action="" method="post" role="form" enctype="multipart/form-data" class="palindrome">
                <input type="hidden" name="token" value="" />

                <div class="form-group">
                    <label for="text"><i class="fa fa-fw fa-paragraph fa-sm text-muted mr-1"></i> Text</label>
                    <textarea id="text" name="text" class="form-control" required="required"><?= $data['values']['text'] ?></textarea>
                    
                </div>

                <button type="submit" name="submit" class="btn btn-block btn-primary" data-is-ajax>Submit</button>
            </form>

        </div>
    </div>

    <div id="result_wrapper" class="mt-4 d-none">
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
                    <textarea id="result" class="form-control"></textarea>
                </div>

            </div>
        </div>
    </div>

    <script>
    // 'use strict';

    let is_palindrome = (s,i) => {
        return (i=i||0)<0||i>=s.length>>1||s[i]==s[s.length-1-i]&&is_palindrome(s,++i);
    }

    let check = () => {
        const text = document.getElementById('text').value;

        if(!text) {
            /* Hide result wrapper */
            document.querySelector('#result_wrapper').classList.add('d-none');
            return;
        }

        pause_submit_button(document.querySelector('[type="submit"][name="submit"]'));

        /* Display result wrapper */
        document.querySelector('#result_wrapper').classList.remove('d-none');

        /* Result */
        let result = is_palindrome(text) ? <?= json_encode('yes') ?> : <?= json_encode('no') ?>;

        document.querySelector('#result').value = result;

        enable_submit_button(document.querySelector('[type="submit"][name="submit"]'));
    }

    ['change', 'paste', 'keyup'].forEach(event_type => {
        document.getElementById('text').addEventListener(event_type, check);
    });

    document.querySelector('form.palindrome').addEventListener('submit', event => {
        event.preventDefault();
        check();
    });

    check();
</script>
<?php include('partials/clipboard_js.php'); ?>
