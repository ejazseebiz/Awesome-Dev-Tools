<?php 
        $data = [];

        $values = [];

        /* Prepare the View */
        $data['values'] = $values;
?>




    <div class="card">
        <div class="card-body">

            <form action="" method="post" role="form" enctype="multipart/form-data">
                <input type="hidden" name="token" value="" />

                <div class="form-group">
                    <label for="type"><i class="fa fa-fw fa-sm fa-fingerprint text-muted mr-1"></i> Type</label>
                    <select id="type" name="type" class="form-control" required="required">
                        <?php foreach(['buy_now', 'add_to_cart', 'donation'] as $key): ?>
                            <option value="<?= $key ?>"><?= ucfirst(str_replace('_', ' ', $key))  ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="email"><i class="fa fa-fw fa-envelope fa-sm text-muted mr-1"></i>  PayPal email</label>
                    <input type="text" id="email" name="email" class="form-control" maxlength="320" />
                    
                </div>

                <div class="form-group">
                    <label for="title"><i class="fa fa-fw fa-heading fa-sm text-muted mr-1"></i> Title</label>
                    <input type="text" id="title" name="title" class="form-control" maxlength="256" />
                    
                </div>

                <div class="row">
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label for="price"><i class="fa fa-fw fa-dollar-sign fa-sm text-muted mr-1"></i> Price</label>
                            <input id="price" type="number" name="price" min="1" step="0.01" class="form-control" placeholder="5" />
                            
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="currency"><i class="fa fa-fw fa-euro-sign fa-sm text-muted mr-1"></i> Currency code</label>
                            <input type="text" id="currency" name="currency" class="form-control" placeholder="USD" maxlength="8" />
                            
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="thank_you_url"><i class="fa fa-fw fa-link fa-sm text-muted mr-1"></i> Thank you URL</label>
                    <input type="url" id="thank_you_url" name="thank_you_url" class="form-control" maxlength="2048" />
                    
                </div>

                <div class="form-group">
                    <label for="cancel_url"><i class="fa fa-fw fa-link fa-sm text-muted mr-1"></i> Cancel URL</label>
                    <input type="url" id="cancel_url" name="cancel_url" class="form-control" maxlength="2048" />
                    
                </div>
            </form>

        </div>
    </div>

    <div class="mt-4">
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
    'use strict';

    let generate = () => {
        let type = document.querySelector('#type').value;
        let email = document.querySelector('#email').value;
        let title = document.querySelector('#title').value;
        let price = document.querySelector('#price').value;
        let currency = document.querySelector('#currency').value;
        let thank_you_url = document.querySelector('#thank_you_url').value;
        let cancel_url = document.querySelector('#cancel_url').value;

        let paypal_type = {
            'buy_now': '_xclick',
            'add_to_cart': '_cart',
            'donation': '_donations'
        };

        let link = null;

        if(type == 'add_to_cart') {
            link = `https://www.paypal.com/cgi-bin/webscr?business=${email}&cmd=${paypal_type[type]}&currency_code=${currency}&amount=${price}&item_name=${title}&button_subtype=products&add=1&return=${thank_you_url}&cancel_return=${cancel_url}`
        } else {
            link = `https://www.paypal.com/cgi-bin/webscr?business=${email}&cmd=${paypal_type[type]}&currency_code=${currency}&amount=${price}&item_name=${title}&return=${thank_you_url}&cancel_return=${cancel_url}`
        }

        document.querySelector('#result').value = link;
    }

    ['#type', '#email', '#title', '#price', '#currency', '#thank_you_url', '#cancel_url'].forEach(selector => document.querySelector(selector).addEventListener('change', generate));
</script>
<?php include('partials/clipboard_js.php'); ?>