<div class="application-tools-wrapper">
    <div class="tool-wrapper">

        <form method="post" action="">
            <div class="row">
                <div class="col-md-12">
                    <div class="mh-300">
                        <textarea type="text" id="html-editor" class="editor" :placeholder="__('common.someText')" />
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="html-editor-result">

        <div class="page-wrapper">
            <div class="result mt-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="custom-textarea p-3">
                            <textarea readonly id="content-editor" class="transparent" rows="8" />
                        </div>
                        <div class="json--results-actions result-copy mt-3 text-end">
                            <button class="btn btn-primary rounded-pill" type="button" id="saveToFile">
                                @lang('tools.saveAsHtml')
                            </button>
                            <x-copy-target target="content-editor" :text="__('common.copyToClipboard')" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('page_scripts')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        const APP = function() {
            let editor = null;
            const attachEvents = function() {
                    document.getElementById('saveToFile').addEventListener('click', () => {
                        ArtisanApp.downloadAsTxt(document.getElementById('content-editor').value, {
                            isElement: false,
                            filename: '{{ $tool->slug . '.html ' }}'
                        })
                    });
                },
                initEditor = function() {
                    document.querySelectorAll('.editor').forEach(elem => {
                        ClassicEditor.create(elem, {})
                            .then(instance => {
                                instance.model.document.on('change:data', (evt, data) => {
                                    document.getElementById('content-editor').value = instance
                                        .getData()
                                });
                            })
                            .catch(error => {
                                console.log('error', error);
                            });
                    });
                };
            return {
                init: function() {
                    initEditor()
                    attachEvents()
                },
            }
        }()
        document.addEventListener("DOMContentLoaded", function(event) {
            APP.init();
        });
    </script>
    @endpush
</div>