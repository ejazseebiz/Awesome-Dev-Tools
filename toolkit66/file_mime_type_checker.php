<?php 
$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );

$data = [];
$values = [];

/* Prepare the View */
$data['values'] = $values;
?>

<script src="<?php echo $plug_fl; ?>js/custom.js"></script>


    <div class="card">
        <div class="card-body">

            <form action="" method="post" role="form" enctype="multipart/form-data">
                <input type="hidden" name="token" value="" />

                <div class="form-group">
                    <label for="file"><i class="fa fa-fw fa-sm fa-file text-muted mr-1"></i> File</label>
                    <input id="file" type="file" name="file" class="form-control-file altum-file-input" />
                    
                </div>

                <button type="submit" name="submit" class="btn btn-block btn-primary" data-is-ajax>Submit</button>
            </form>

        </div>
    </div>

    <div id="result_wrapper" class="mt-4 d-none">
        <div class="table-responsive table-custom-container">
            <table class="table table-custom">
                <tbody>
                <tr>
                    <td class="font-weight-bold">
                        File Name
                    </td>
                    <td class="text-nowrap" id="file_name"></td>
                </tr>
                <tr>
                    <td class="font-weight-bold">
                        File Size
                    </td>
                    <td class="text-nowrap" id="file_size"></td>
                </tr>
                <tr>
                    <td class="font-weight-bold">
                        File Type
                    </td>
                    <td class="text-nowrap" id="file_type"></td>
                </tr>
                <tr>
                    <td class="font-weight-bold">
                    Last modified date	
                    </td>
                    <td class="text-nowrap" id="file_last_modified_date"></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>


    


<script>
    // 'use strict';

    let check = () => {
        pause_submit_button(document.querySelector('[type="submit"][name="submit"]'));

        const file = document.getElementById('file').files[0];

        if(!file) {
            /* Hide result wrapper */
            document.querySelector('#result_wrapper').classList.add('d-none');
            return;
        }

        /* Display result wrapper */
        document.querySelector('#result_wrapper').classList.remove('d-none');

        /* Display file details */
        document.querySelector('#file_type').innerHTML = file.type;
        document.querySelector('#file_name').innerHTML = file.name;
        document.querySelector('#file_size').innerHTML = get_formatted_bytes(file.size);
        document.querySelector('#file_last_modified_date').innerHTML = file.lastModifiedDate;

        enable_submit_button(document.querySelector('[type="submit"][name="submit"]'));
    }

    let get_formatted_bytes = bytes => {
        let selected_size = 0;
        let selected_unit = 'B';

        if (bytes > 0) {
            let units = ['TB', 'GB', 'MB', 'KB', 'B'];

            for (let i = 0; i < units.length; i++) {
                let unit = units[i];
                let cutoff = Math.pow(1000, 4 - i) / 10;

                if (bytes >= cutoff) {
                    selected_size = bytes / Math.pow(1000, 4 - i);
                    selected_unit = unit;
                    break;
                }
            }

            selected_size = Math.round(10 * selected_size) / 10;
        }

        return `${selected_size} ${selected_unit}`;
    }

    document.getElementById('file').addEventListener('change', check);
    document.querySelector('form').addEventListener('submit', event => {
        event.preventDefault();
        check();
    });
</script>

<?php include('partials/clipboard_js.php'); ?>
