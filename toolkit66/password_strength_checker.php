<?php 
        $data = [];

        $values = [
            'password' => $_POST['password'] ?? null,
        ];

        /* Prepare the View */
        $data['values'] = $values;
?>




    <div class="card">
        <div class="card-body">

            <form action="" method="post" role="form">
                <input type="hidden" name="token" value="" />

                <div class="form-group">
                    <label for="password"><i class="fa fa-fw fa-key fa-sm text-muted mr-1"></i> Password</label>
                    <input type="text" id="password" name="password" class="form-control" value="<?= $data['values']['password'] ?>" required="required" />
                    
                    
                </div>
            </form>

        </div>
    </div>

    <div class="mt-4">
        <div class="table-responsive table-custom-container">
            <table class="table table-custom">
                <tbody>
                <tr>
                    <td class="font-weight-bold">
                    Characters
                    </td>
                    <td class="text-nowrap">
                        <span id="characters"></span>
                    </td>
                </tr>
                <tr>
                    <td class="font-weight-bold">
                    Strength
                    </td>
                    <td class="text-nowrap">
                        <span id="strength"></span>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>


    
<script>
    'use strict';

    let password_strength_check = () => {
        let password = document.querySelector('#password').value;

        /* Generate the password score */
        let password_score = 0
        let password_minimum_length = 8;

        let regexLower = new RegExp('(?=.*[a-z])');
        let regexUpper = new RegExp('(?=.*[A-Z])');
        let regexDigits = new RegExp('(?=.*[0-9])');
        let regexLength = new RegExp('(?=.{' + password_minimum_length + ',})');

        if (password.match(regexLower)) { ++password_score }
        if (password.match(regexUpper)) { ++password_score }
        if (password.match(regexDigits)) { ++password_score }
        if (password.match(regexLength)) { ++password_score }

        if (password_score === 0 && password.length > 0) { ++password_score }

        switch(password_score) {
            case 1:
                document.querySelector('#strength').textContent = <?= json_encode('Very Low') ?>;
                document.querySelector('#strength').setAttribute('class', 'text-danger');
                break
            case 2:
                document.querySelector('#strength').textContent = <?= json_encode('Low') ?>;
                document.querySelector('#strength').setAttribute('class', 'text-warning');
                break
            case 3:
                document.querySelector('#strength').textContent = <?= json_encode('Moderate') ?>;
                document.querySelector('#strength').setAttribute('class', 'text-info');
                break
            case 4:
                document.querySelector('#strength').textContent = <?= json_encode('Strong') ?>;
                document.querySelector('#strength').setAttribute('class', 'text-success');
                break
            default:
                document.querySelector('#strength').textContent = <?= json_encode('No Data') ?>;
                document.querySelector('#strength').removeAttribute('class');
        }

        document.querySelector('#characters').textContent = password.length;
    }

    ['change', 'paste', 'keyup'].forEach(event_type => document.querySelector('#password').addEventListener(event_type, password_strength_check));

    password_strength_check();
</script>
<?php include('partials/clipboard_js.php'); ?>
