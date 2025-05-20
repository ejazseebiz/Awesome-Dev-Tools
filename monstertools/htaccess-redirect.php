<?php
// Include necessary files

include('helper/helpers.php');
include('helper/strings.php');

use App\MonsTools\Tools\HtaccessRedirect;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $domain = $_POST["domain"];
    $type = $_POST["type"];
    $tool = new HtaccessRedirect();
    $results = $tool->handle($domain, $type);
}

?>

<div class="application-tools-wrapper">
    <div class="tool-wrapper">

        <form method="post" action="">
            <div class="box-shadow my-3 py-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="domain">Domain Name, no_domain_tool</label>
                            <input class="form-control" name="domain" id="domain" placeholder="Enter a Domain" autofocus
                                required value="<?php echo $results['domain'] ?? old('domain') ?>" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="fw-bold">
                            <label>Select Redirect Type</label>
                        </div>
                        <div class="form-group">
                            <label class="radio-checkbox-wrapper">
                                <input type="radio" id="toggle" class="radio-checkbox-input" name="type"
                                    value="1" <?php if (isset($type) && $type == '1'): ?> checked <?php endif ?> />
                                <span class="radio-checkbox-tile">
                                    <span>Redirect From www to non-www</span>
                                </span>
                            </label>
                            <label class="radio-checkbox-wrapper">
                                <input class="radio-checkbox-input" id="sentence" type="radio" name="type"
                                    value="2" autocomplete="off" <?php if (isset($type) && $type == '2'): ?> checked <?php endif ?> />
                                <span class="radio-checkbox-tile">
                                    <span>Redirect From non-www to www</span>
                                </span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12 text-end">
                    <button type="submit" class="btn btn-outline-primary rounded-pill">
                        Get Your HtAccess Code
                    </button>
                </div>
            </div>
        </form>
    </div>
    <?php if (isset($results)): ?>
        <div class="tool-results-wrapper">
            <div class="page-wrapper">
                <div class="result mt-4">
                    <div class="row">
                        <div class="col-md-12">
                            <p>Copy Htaccess Code Help</p>
                        </div>
                        <div class="col-md-12">
                            <textarea rows="6" type="text" class="form-control h-80" id="save-as-file"><?php echo $results['content'] ?? '' ?></textarea>
                        </div>
                        <div class="col-md-12 text-end">

                            <button type="button" onclick="copyToClipboard('#save-as-file')">Copy to Clipboard</button>
                            <button type="button" id="btn-download-file" onclick="downloadFile('htaccess.txt', 'text/css', '#save-as-file')">Download TXT</button>

                            <!-- <button class="btn btn-primary rounded-pill mt-2" type="button"
                                onclick="ArtisanApp.downloadAsTxt('#save-as-file', {filename: '{{ $tool->slug . '.txt' }}'})">
                                @lang('tools.saveAsTxt')
                            </button> -->
                            <!-- <x-copy-target class="btn-primary mt-2" :svg="false" target="save-as-file"
                                :text="__('common.copyToClipboard')" /> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif ?>
</div>



<script>
    const APP = function() {
        const attachEvents = function() {

            <?php if (isset($results)): ?>
                if (document.getElementById('btn-download-file')) {
                    document.getElementById('btn-download-file').addEventListener('click', () => {
                        downloadFile('minified.css', 'text/css', '#minifiedCss');


                    })
                }
            <?php endif; ?>
        };

        return {
            init: function() {
                attachEvents()
            },
        }
    }()
    document.addEventListener("DOMContentLoaded", function(event) {
        APP.init();
    });

    function copyToClipboard(target) {
        const element = document.querySelector(target);
        element.select();
        document.execCommand("copy");
        alert("Copied to clipboard");
    }

    function downloadFile(filename, mimeType, target) {
        const element = document.querySelector(target);
        const blob = new Blob([element.value], {
            type: mimeType
        });
        const link = document.createElement('a');
        link.href = URL.createObjectURL(blob);
        link.download = filename;
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }
</script>