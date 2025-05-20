<div class="application-tools-wrapper">
    <div class="tool-wrapper">

        <form method="post" action="">
            <x-tool-property-display :tool="$tool" name="wc_tool" label="wordCountLimit" :plans="true"
                upTo="upTo30k">
            </x-tool-property-display>
            <div class="row mb-4">
                <div class="col-md-12 mt-2 mb-3">
                    <div class="form-group">
                        <textarea type="text" name="string" class="form-control" rows="8"
                            :placeholder="__('common.someText')" id="textarea" required autofocus contenteditable="true">
                            {{ $results['original_text'] ?? old('string') }}
                        </textarea>
                    </div>
                    <x-input-error :messages="$errors->get('string')" class="mt-2" />
                </div>
                <div class="col-md-12 d-flex">
                    <div class="me-auto">
                        <x-input-file-button />
                    </div>
                    <div class="ms-auto">
                        <button type="submit" class="btn-outline-primary rounded-pill text-end">
                            @lang('tools.paraphrase')
                        </button>
                    </div>
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
                        <div class="box-shadow tabbar mb-3 custom-textarea">
                            <textarea id="rewrite-result" class="form-control transparent" rows="12">
                                {{ $results['converted_text'] }}
                            </textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <x-copy-target target="rewrite-result" />
                                <x-download-form-button type="button"
                                    onclick="ArtisanApp.downloadAsTxt('#rewrite-result', {filename: '{{ $tool->slug . '.txt' }}'})"
                                    :tooltip="__('tools.saveAsTxt')" />
                                <x-print-button
                                    onclick="ArtisanApp.printResult(document.querySelector('#rewrite-result'), {title: '{{ $tool->name }}'})"
                                    :tooltip="__('tools.printResult')" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endif

    @push('page_scripts')
    <script>
        const APP = function() {
            let editorInstance = document.getElementById('textarea');
            const attachEvents = function() {
                document.getElementById('file').addEventListener('change', e => {
                    var file = document.getElementById("file").files[0];
                    if (file.type != "text/plain") {
                        ArtisanApp.toastError("{{ __('common.invalidFile') }}");
                        return;
                    }
                    APP.setFileContent(file);
                });
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
    @endpush
</div>