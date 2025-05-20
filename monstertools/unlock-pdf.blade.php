<div class="application-tools-wrapper">
    <div class="tool-wrapper">

        <x-form method="post" :route="route('tool.handle', $tool->slug)" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div id="imageUploader" class="form-group">
                        <x-pdf-upload-wrapper max-files="1" :max-size="$tool->fs_tool" accept=".pdf" input-name="files[]"
                            pages="false" rotate="false" preview="true" sortable="false"
                            callbacks="{filePasswordRequired: APP.isFilePasswordProtected}" />
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12 text-end">
                    <button type="submit" class="btn btn-outline-primary rounded-pill">
                        @lang('tools.unlockPDF')
                    </button>
                </div>
            </div>
            </form>
    </div>
    <?php if (isset($results)): ?>
    <div class="tool-results-wrapper">

        <div class="page-wrapper">
            <div class="result mt-4">
                <table class="table table-style">
                    <thead>
                        <tr>
                            <th>@lang('common.fileName')</th>
                            <th width="200">@lang('common.size')</th>
                            <th width="150"></th>
                        </tr>
                    </thead>
                    <tbody id="processing-files">
                        @foreach ($results['files'] as $file)
                        <tr>
                            <td>
                                <div class="mw-350 text-truncate fw-bold">{{ $file['filename'] }}</div>
                            </td>
                            <td>{{ formatSizeUnits($file['size']) }}</td>
                            <td id="file-cursor">
                                <button class="btn btn-outline-primary rounded-circle download-file-btn"
                                    data-bs-toggle="tooltip" title="@lang('common.download')" type="button"
                                    id="download-file" data-url="{{ $file['url'] }}"
                                    data-filename="{{ $file['filename'] }}">
                                    <i class="an an-long-arrow-down"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif

    @push('page_scripts')
    <script src="{{ url('themes/default/js/pdf/pdf.min.js') }}"></script>
    @vite(['resources/themes/canvas/assets/js/app-pdf.js'])
    <script>
        pdfjsLib.GlobalWorkerOptions.workerSrc = '{{ url('
        themes /
            default / js / pdf / pdf.worker.min.js ') }}';
        const APP = function() {
            let isSelected = false;
            const attachEvents = function() {
                document.querySelectorAll('.download-file-btn').forEach(button => {
                    button.addEventListener('click', e => {
                        const element = e.target.classList.contains('.download-file-btn') ? e
                            .target : e.target.closest('.download-file-btn')
                        ArtisanApp.downloadFromUrl(element.dataset.url, element.dataset
                            .filename)
                    })
                });
            };
            return {
                init: function() {
                    attachEvents();
                },
                isFilePasswordProtected: function(file) {
                    ArtisanApp.toastError("{{ __('tools.fileAlreadyUnlockedMsg') }}".replace(':file', file.name))
                    return true;
                }
            }
        }();
        document.addEventListener("DOMContentLoaded", function(event) {
            APP.init();
        });
    </script>
    @endpush
</div>