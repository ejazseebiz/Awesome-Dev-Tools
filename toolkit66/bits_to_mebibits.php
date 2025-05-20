<?php
$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );
?>

<script src="<?php echo $plug_fl; ?>js/custom.js"></script>

    <div class="card">
        <div class="card-body">

            <form action="" method="post" role="form" enctype="multipart/form-data">
                <input type="hidden" name="token" value="" />

                <div class="form-group">
                    <label for="input"><i class="fa fa-fw fa-sort-numeric-up-alt fa-sm text-muted mr-1"></i> Bits</label>
                    <input type="number" step="1" id="input" name="input" class="form-control" value="1" required="required" />
                </div>

                <div class="form-group">
                    <label for="precision"><i class="fa fa-fw fa-ellipsis-h fa-sm text-muted mr-1"></i> Precision</label>
                    <input type="number" id="precision" min="0" step="1" name="precision" class="form-control" value="4" required="required" />
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
                        <label for="result">MebiBits</label>
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



    <?php include('partials/clipboard_js.php'); ?>
  
    
<script>

    let convert = () => {
        pause_submit_button(document.querySelector('[type="submit"][name="submit"]'));

        const input = parseFloat(document.getElementById('input').value);
        const precision = parseInt(document.getElementById('precision').value);

        if(!input) {
            /* Hide result wrapper */
            document.querySelector('#result_wrapper').classList.add('d-none');
            return;
        }

        /* Display result wrapper */
        document.querySelector('#result_wrapper').classList.remove('d-none');

        /* Calculate result */
        let result = nr(input / Math.pow(1024, 2), precision);

        document.querySelector('#result').value = result;

        enable_submit_button(document.querySelector('[type="submit"][name="submit"]'));
    }

    ['change', 'paste', 'keyup'].forEach(event_type => {
        document.getElementById('input').addEventListener(event_type, convert);
        document.getElementById('precision').addEventListener(event_type, convert);
    });

    document.querySelector('form').addEventListener('submit', event => {
        event.preventDefault();
        convert();
    });

    convert();
</script>

