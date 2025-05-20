<div class="application-tools-wrapper">
    <x-ad-slot :advertisement="get_advert_model('above-tool')" />
    <div class="tool-wrapper">

        <div class="panel-left-generator box-shadow py-5">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="">
                        <div class="panel-left-radio">
                            <div class="panel-left">
                                <div class="controller mb-3">
                                    <div class="custom-radio-checkbox">
                                        <label class="radio-checkbox-wrapper">
                                            <input type="radio" id="encode" class="radio-checkbox-input"
                                                name="type" value="1"
                                                @if (isset($type) && $type=='1' ) checked @endif />
                                            <span class="radio-checkbox-tile">
                                                <span>@lang('tools.encode')</span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="custom-radio-checkbox">
                                        <label class="radio-checkbox-wrapper">
                                            <input class="radio-checkbox-input" id="decode" type="radio"
                                                name="type" value="2" autocomplete="off"
                                                @if (isset($type) && $type=='2' ) checked @endif>
                                            <span class="radio-checkbox-tile">
                                                <span>@lang('tools.decode')</span>
                                            </span>
                                        </label>
                                    </div>
                                    <x-input-error :messages="$errors->get('type')" />
                                    <button type="submit" class="btn btn-primary rounded-pill">
                                        @lang('common.generate')
                                    </button>
                                    @if (!isset($results))
                                    <x-input-file-button :svg="false"
                                        class="btn btn-primary rounded-pill d-block upload-btn mt-2"
                                        file-id="fileInput" accept=".txt" />
                                    @else
                                    <button class="btn-primary rounded-pill mt-2" type="button"
                                        onclick="ArtisanApp.downloadAsTxt('#save-as-file', {filename: '{{ $tool->slug . '.txt' }}'})">
                                        @lang('tools.saveAsTxt')
                                    </button>
                                    <x-copy-target class="btn-primary mt-2" :svg="false" target="save-as-file"
                                        :text="__('common.copyToClipboard')" />
                                    @endif
                                </div>
                                <div class="textarea d-flex flex-column justify-content-between">
                                    <textarea type="text" name="string" class="form-control h-50 mb-3"
                                        :placeholder="__('common.someText')" id="textarea" required autofocus>
                                    {{ $results['original_text'] ?? old('string') }}
                                    </textarea>
                                    <x-input-error :messages="$errors->get('string')" class="mt-2" />
                                    <textarea type="text" class="form-control h-50" id="save-as-file">
                                        {!! $results['converted_text'] ?? '' !!}
                                    </textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <x-ad-slot class="mt-3" :advertisement="get_advert_model('below-form')" />
    </div>

    @push('page_scripts')
    <script>
        const APP = function() {
            const editorInstance = document.querySelector('#textarea')
            const attachEvents = function() {
                if (document.getElementById('fileInput')) {
                    document.getElementById('fileInput').addEventListener('change', e => {
                        var file = document.getElementById("fileInput").files[0];
                        if (file.type != "text/plain") {
                            ArtisanApp.toastError("{{ __('common.invalidFile') }}");
                            return;
                        }
                        APP.setFileContent(file);
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
    @endpush
</div>