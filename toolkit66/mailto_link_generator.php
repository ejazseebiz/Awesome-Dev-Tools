<?php 

$data = [];

$values = [
];

/* Prepare the View */
$data['values'] = $values;
 ?>




    <div class="card">
        <div class="card-body">

            <form action="" method="post" role="form" enctype="multipart/form-data">
                <input type="hidden" name="token" value="" />

                <div class="form-group">
                    <label for="to">To email</label>
                    <input type="email" id="to" name="to" class="form-control" />

                </div>

                <div class="row">
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label for="cc">CC</label>
                            <input type="text" id="cc" name="cc" class="form-control" />
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="bcc">BCC</label>
                            <input type="text" id="bcc" name="bcc" class="form-control" />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" name="subject" class="form-control" />
                    
                </div>

                <div class="form-group">
                    <label for="body">Body Content</label>
                    <textarea type="text" id="body" name="body" class="form-control"></textarea>
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
        let to = document.querySelector('#to').value;
        let cc = document.querySelector('#cc').value;
        let bcc = document.querySelector('#bcc').value;
        let subject = document.querySelector('#subject').value;
        let body = document.querySelector('#body').value;

        let link = `mailto:${to}`;

        if(cc || bcc || subject || body) {
            link += '?';
            let parameters = [];

            if(cc) parameters.push(`cc=${cc.trim()}`);
            if(bcc) parameters.push(`bcc=${bcc.trim()}`);
            if(subject) parameters.push(`subject=${encodeURIComponent(subject.trim())}`);
            if(body) parameters.push(`body=${encodeURIComponent(body.trim())}`);

            link += parameters.join('&');
        }

        document.querySelector('#result').value = link;
    }

    ['#to', '#cc', '#bcc', '#subject', '#body'].forEach(selector => document.querySelector(selector).addEventListener('change', generate));
</script>

<?php include('partials/clipboard_js.php'); ?>
