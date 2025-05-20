<div class="application-tools-wrapper">
    <div class="tool-wrapper">

        <x-form method="post" :route="route('tool.handle', $tool->slug)" enctype="multipart/form-data">
            <div class="row custom-textarea-wrapper">
                <div class="col-md-12 mb-3">
                    <label>{{ __('tools.enterPasteJs') }}</label>
                    <div class="custom-textarea p-3">
                        <textarea class="transparent" rows="8" spellcheck="false" id="javaScript"
                            name="javaScript" required>
                            {{ $results['javaScript'] ?? '' }}</textarea>
                        <x-input-error :messages="$errors->get('javaScript')" class="mt-2" />
                        <div class="file-input-container mt-2">
                            <x-input-file-button file-id="fileInput" accept=".js" />
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12 text-end">
                    <button type="submit" class="btn btn-outline-primary rounded-pill" id="minify">
                        {{ __('tools.minify') }}
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
                        <div class="col-md-12 mb-3">
                            <table class="table table-style">
                                <thead>
                                    <th>@lang('tools.originalSize')</th>
                                    <th>@lang('tools.minifiedSize')</th>
                                    <th width="200">@lang('tools.saveSize')</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ formatSizeUnits($results['input_size']) }}</td>
                                        <td>{{ formatSizeUnits($results['output_size']) }}</td>
                                        <td>{{ formatSizeUnits($results['input_size'] - $results['output_size']) }}
                                            ({{ $results['save_size'] }} %)</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12">
                            <div class="custom-textarea p-3">
                                <textarea id="minifiedJs" class="transparent" readonly rows="8">
                                    {{ $results['content'] }}
                                </textarea>
                            </div>
                            <div class="result-copy mt-3 text-end">
                                <x-copy-target target="minifiedJs" :text="__('common.copyToClipboard')" :svg="false" />
                                <x-download-form-button type="button" id="btn-download-file" :tooltip="__('tools.downloadJs')" />
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
            const editorInstance = document.querySelector('#javaScript')
            const attachEvents = function() {
                if (document.getElementById('fileInput')) {
                    document.getElementById('fileInput').addEventListener('change', e => {
                        var file = document.getElementById("fileInput").files[0];
                        if (file.type != "text/javascript" && file.type != "application/x-javascript") {
                            ArtisanApp.toastError("{{ __('common.invalidFile') }}");
                            return;
                        }
                        APP.setFileContent(file);
                    });
                };
                @if(isset($results))
                if (document.getElementById('btn-download-file')) {
                    document.getElementById('btn-download-file').addEventListener('click', () => {
                        ArtisanApp.downloadAsTxt('#minifiedJs', {
                            filename: "{{ $tool->slug }}.js",
                            fileMime: 'application/x-javascript'
                        });
                    })
                }
                @endif
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