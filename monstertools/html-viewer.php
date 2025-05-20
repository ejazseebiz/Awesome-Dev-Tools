<div class="application-tools-wrapper">
    <div class="tool-wrapper">

        <x-form method="post" :route="route('tool.handle', $tool->slug)" enctype="multipart/form-data">
            <div class="row custom-textarea-wrapper">
                <div class="col-md-12 mb-3">
                    <label>ؑEnter or Paste Html</label>
                    <div class="custom-textarea p-3">
                        <textarea class="transparent" rows="8" spellcheck="false" id="htmlInput" name="html"
                            required style="width: 100%;"><?php echo $results['html'] ?? '' ?></textarea>

                        <div class="file-input-container mt-2">
                            <input type="file" id="fileInput" accept=".html" />
                        </div>
                    </div>
                </div>

                <div class="col-md-12 text-end">
                    <button type="button" class="btn btn-outline-primary rounded-pill" id="runHtml">
                        Run View
                    </button>
                </div>
            </div>
            </form>
    </div>
    <x-page-wrapper class="d-none" id="html-result" :title="__('common.result')">
        <div class="result mt-4">
            <div class="result tool-results">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box-shadow tabbar">
                            <iframe class="w-100 mh-400" id="html-output" sandbox="allow-scripts"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

<script>
    const APP = function() {
        const editorInstance = document.querySelector('#htmlInput')
        const outputElement = document.querySelector('#html-result')
        const attachEvents = function() {
                document.getElementById('runHtml').addEventListener('click', function() {
                    showHtml(editorInstance.value, true)
                });
                editorInstance.addEventListener('input', function() {
                    showHtml(this.value, false)
                });
                if (document.getElementById('fileInput')) {
                    document.getElementById('fileInput').addEventListener('change', e => {
                        var file = document.getElementById("fileInput").files[0];
                        if (file.type != "text/html") {
                            ArtisanApp.toastError("{{ __('common.invalidFile') }}");
                            return;
                        }
                        APP.setFileContent(file);
                    });
                };
            },
            showHtml = function(html, focus) {
                document.getElementById('html-output').srcdoc = html;
                outputElement.classList.remove('d-none')
                if (focus) {
                    outputElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
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
</script>