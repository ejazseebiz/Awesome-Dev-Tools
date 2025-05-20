<?php
// Include necessary files
include('helper/helpers.php');
include('helper/strings.php');

use App\MonsTools\Tools\CssMinify;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $css = $_POST["css"];
    $tool = new CssMinify();
    $results = $tool->handle($css, 'css-minify');
}
?>

<div class="application-tools-wrapper">
    <div class="tool-wrapper">
        <form method="post" action="">
            <div class="row custom-textarea-wrapper">
                <div class="col-md-12 mb-3">
                    <label>Enter or Paste CSS</label>
                    <div class="custom-textarea p-3">
                        <textarea style="width:100%" class="transparent" rows="8" spellcheck="false" id="cssInput" name="css"
                            required><?php echo $results['css'] ?? '' ?></textarea>
                        <div class="file-input-container mt-2">
                            <input type="file" id="fileInput" accept=".css" />
                        </div>
                    </div>
                </div>

                <div class="col-md-12 text-end">
                    <button type="submit" class="btn btn-outline-primary rounded-pill" id="minify">
                        Minify
                    </button>
                </div>
            </div>
        </form>
    </div>
    <?php if (isset($results)): ?>
        <div class="tool-results-wrapper">
            <div class="page-wrapper">
                <div class="result mt-4">
                    <div class="result tool-results">
                        <div class="row">
                            <div class="custom-textarea p-3">
                                <textarea id="minifiedCss" style="width:100%" class="transparent" readonly rows="8"><?php echo $results['content'] ?></textarea>
                            </div>

                            <div class="col-md-12 mb-3">
                                <table class="table table-style">
                                    <thead>
                                        <th>Original Size</th>
                                        <th>Minified Size</th>
                                        <th width="200">Save Size</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo formatSizeUnits($results['input_size']) ?></td>
                                            <td><?php echo formatSizeUnits($results['output_size']) ?></td>
                                            <td><?php echo formatSizeUnits($results['input_size'] - $results['output_size']) ?>
                                                (<?php echo $results['save_size'] ?> %)</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-12">
                                <div class="result-copy mt-3 text-end">
                                    <button type="button" onclick="copyToClipboard('#minifiedCss')">Copy to Clipboard</button>
                                    <button type="button" id="btn-download-file" onclick="downloadFile('minified.css', 'text/css', '#minifiedCss')">Download</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>



    <script>
        const APP = function() {
            const editorInstance = document.querySelector('#cssInput')
            const attachEvents = function() {
                if (document.getElementById('fileInput')) {
                    document.getElementById('fileInput').addEventListener('change', e => {
                        var file = document.getElementById("fileInput").files[0];
                        if (file.type != "text/css") {
                            // ArtisanApp.toastError("{{ __('common.invalidFile') }}");
                            alert("Invalid file type.");
                            return;
                        }
                        APP.setFileContent(file);
                    });
                };
                <?php if (isset($results)): ?>
                    if (document.getElementById('btn-download-file')) {
                        document.getElementById('btn-download-file').addEventListener('click', () => {
                            downloadFile('minified.css', 'text/css', '#minifiedCss');

                            // ArtisanApp.downloadAsTxt('#minifiedCss', {
                            //     filename: "{{ $tool->slug }}.css",
                            //     fileMime: 'text/css'
                            // });
                        })
                    }
                <?php endif; ?>
            };

            return {
                init: function() {
                    attachEvents()
                },
                setFileContent: function(file) {
                    var reader = new FileReader();
                    reader.readAsText(file, "UTF-8");
                    reader.onload = function(evt) {
                        editorInstance.value = evt.target.result;
                    }
                    reader.onerror = function(evt) {
                        ArtisanApp.toastError("error reading file");
                    }
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

</div>