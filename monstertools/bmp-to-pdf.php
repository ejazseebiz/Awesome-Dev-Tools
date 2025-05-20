<?php

$maxFiles = 1;
require_once('vendors/Carbon/autoload.php');
require_once('components/ToolsManager.php');
if (!empty($_POST)) {
    $_POST['convert_to'] = 'jpg';
    $_POST['output'] = 'pdf';
    $_POST['filename'] = 'bmp-to-pdf';
    $_POST['device'] = 'pdfwrite';
    $_POST['arguments'] = ['viewjpeg.ps'];


    // $request->request->add(['convert_to' => 'jpg']);
    // $request->request->add(['output' => 'pdf']);
    // $request->request->add(['filename' => $tool->name]);
    // $request->request->add(['device' => 'pdfwrite']);
    // $request->request->add(['arguments' => ['viewjpeg.ps']]);

    // $request->validate([
    //     'files' => 'required|array',
    //     'files.*' => 'mimes:bmp',
    //     'margin' => 'required',
    //     'page_orientation' => 'required',
    //     'page_size' => 'required',
    //     'merge_pages' => 'nullable',
    // ]);

    $driver = (new ToolsManager($tool))->driver();
    if (method_exists($driver, 'setTask')) {
        $driver->setTask('imagepdf');
    }
    $results = $driver->parse($request);

    if (!$results['files']) {
        return redirect()->back()->withErrors(__('common.somethingWentWrong'));
    }
}
?>


<form method="post" action="" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-12 mb-3">
            <div id="imageUploader" class="form-group">
                <x-pdf-upload-wrapper :max-files="$tool->no_file_tool" :max-size="$tool->fs_tool" accept=".bmp" input-name="files[]"
                    :file-title="__('tools.dropImageHereTitle')" pages="false" rotate="true" preview="true" sortable="true"
                    callbacks="{onFileChange: APP.onFileChange}">
                    <x-slot name="svg">
                        <i class="an an-image"></i>
                    </x-slot>

                    <!-- @props([
    'accept' => '.pdf',
    'maxSize' => null,
    'maxFiles' => 1,
    'fileTitle' => __('tools.dropPDFHereTitle'),
    'fileLabel' => __('admin.selectFileOrDrag'),
    'buttonLabel' => __('admin.selectAFile'),
    'id' => 'file-uploader',
    'dropOnBody' => true,
    'inputName' => 'files',
    'onSelectFile' => null,
    'pages' => 'false',
    'preview' => 'true',
    'rotate' => 'true',
    'sortable' => 'false',
    'callbacks' => '{}',
    'equalHeight' => false,
    'allowProtectedFiles' => 'true',
]) -->
                    <div class="artisan-uploader bg-light rounded uploader-file-uploader <?php echo ($equalHeight ? ' h-100' : ''); ?>">
                        <input id="file-uploader" type="file" name="files"
                            accept=".bmp" <?php echo ($maxFiles > 1 ? ' multiple' : ''); ?> />
                        <input type="hidden" class="pdf_file__data" name="fileData">
                        <div class="bg-priamary p-2 add-more d-none">
                            <div class="d-flex justify-content-between align-items-center">
                                <label class="btn btn-primary btn-pill" for="file-uploader">+</label>
                                <div class="ml-auto pdf___more-actions">

                                </div>
                            </div>
                        </div>
                        <label for="file-uploader" class="position-relative file-drag{{ $slot->isEmpty() ? '' : ' pb-1' }}">
                            <div class="file-loader">
                                <div class="spinner-grow" role="status">
                                    <span class="sr-only">@lang('common.loading')</span>
                                </div>
                            </div>
                            <div class="uploader-wrapper">
                                @if (!empty($svg))
                                {{ $svg }}
                                @else
                                <i class="an an-overview"></i>
                                @endif
                                @if ($fileTitle)
                                <h3>{{ $fileTitle }}</h3>
                                @endif
                                @if (!empty($accept))
                                <div class="uploader-extensions mb-3">
                                    @foreach (explode(',', $accept) as $ext)
                                    <span class="badge text-uppercase">{{ $ext }}</span>
                                    @endforeach
                                </div>
                                @endif
                                <p>{{ $fileLabel }}</p>
                                <span class="btn btn-dark file-upload-btn">{{ $buttonLabel }}</span>
                            </div>
                            <div class="files-grid"></div>
                        </label>
                        @if (!$slot->isEmpty())
                        <div class="uploader-after p-3">
                            {{ $slot }}
                        </div>
                        @endif
                    </div>


                    <div class="options-wrapper row d-none justify-content-center">
                        <div class="col-md-12 text-center">
                            <h3>BMP To PDF Options</h3>
                        </div>
                        <div class="col-auto">
                            <select name="page_size" id="page_size" class="form-select">
                                <option value="Fit">Fit (Same page size as image)</option>
                                <option value="A4">A4 (297x210 mm)</option>
                                <option value="Letter">US Letter (215x279.4 mm)</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <select name="page_orientation" id="page_orientation" class="form-select">
                                <option value="auto">Automatic</option>
                                <option value="portrait">Portrait</option>
                                <option value="landscape">Landscape</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <select name="margin" id="margin" class="form-select">
                                <option value="no-margin">No Margin</option>
                                <option value="small-margin">Small Margin</option>
                                <option value="big-margin">Big Margin</option>
                            </select>
                        </div>
                        <div class="col-auto d-flex align-items-center">
                            <div class="form-check">
                                <input type="checkbox" name="merge_pages" id="merge_pages"
                                    class="form-check-input" value="1" checked>
                                <label class="form-check-label" for="merge_pages">@lang('tools.mergeImagesInPDFFile')</label>
                            </div>
                        </div>
                    </div>
                </x-pdf-upload-wrapper>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 text-end">
            <button type="submit" name="submit" class="btn btn-outline-primary rounded-pill">
                Convert to PDF
            </button>
        </div>
    </div>
</form>


<?php if (isset($_POST['submit'])): ?>
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
                    <tbody>
                        @foreach ($results['files'] as $file)
                        <tr>
                            <td>
                                <div class="mw-350 text-truncate fw-bold">{{ $file['filename'] }}</div>
                            </td>
                            <td>{{ formatSizeUnits($file['size']) }}</td>
                            <td id="file-cursor">
                                <button class="btn btn-outline-primary rounded-circle download-file-btn"
                                    data-bs-toggle="tooltip" title="@lang('common.download')" type="button"
                                    id="download-file-{{ $loop->index }}" data-url="{{ $file['url'] }}"
                                    data-filename="{{ $file['filename'] }}">
                                    <i class="an an-long-arrow-down"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="text-end">
                @if (count($results['files']) > 1)
                <x-form class="no-app-loader download-all-btn d-inline-block" method="post" :route="route('tool.postAction', ['tool' => $tool->slug, 'action' => 'download-all'])">
                    <input type="hidden" name="process_id" value="{{ $results['process_id'] }}">
                    <x-download-form-button :text="__('tools.downloadAll')" />
                    </form>
                    @endif
                    <x-reload-button :link="route('tool.show', ['tool' => $tool->slug])" />
            </div>
        </div>
    </div>
<?php endif ?>

<script src="<?php echo $plug_fl; ?>js/pdf/pdf.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/app-pdf.js"></script>


<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        PDFApp.initPDFUpload(document.querySelector('.uploader-{{ $id }}'), {
                dropOnBody: {
                    {
                        $dropOnBody ? 'true' : 'false'
                    }
                },
                maxFiles: {
                    {
                        $maxFiles
                    }
                },
                previewPages: {
                    {
                        $pages
                    }
                },
                allowPreview: {
                    {
                        $preview
                    }
                },
                allowRotate: {
                    {
                        $rotate
                    }
                },
                isSortable: {
                    {
                        $sortable
                    }
                },
                allowProtectedFiles: {
                    {
                        $allowProtectedFiles
                    }
                },
                fileExtensions: "{{ Str::replace(',', '|', $accept) }}",
                @if(!empty($maxSize))
                maxSize: {
                    {
                        $maxSize
                    }
                },
                @endif
            }, {
                extensionsError: "{{ __('admin.fileTypeNotSupported') }}",
                sizeError: "{{ __('admin.maxFileSizeError', ['size' => $maxSize]) }}",
                filesError: "{{ __('admin.maxFileLimitError') }}",
                tooManyInvalidAttempts: "{{ __('tools.tooManyInvalidAttempts') }}",
                fileNotSupported: "{{ __('tools.fileNotSupported') }}",
            },
            @if($callbacks) {
                {
                    $callbacks
                }
            }
            @endif
        );
    });
</script>

<!-- <script src="{{ url('themes/default/js/pdf/pdf.min.js') }}"></script> -->
<!-- @vite(['resources/themes/canvas/assets/js/app-pdf.js']) -->
<script>
    pdfjsLib.GlobalWorkerOptions.workerSrc = '{{ url('
    themes /
        default / js / pdf / pdf.worker.min.js ') }}';
    const APP = function() {
        let isSelected = false;
        const optionsWrapper = document.querySelector('.options-wrapper')
        const attachEvents = function() {
            document.querySelectorAll('.download-file-btn').forEach(button => {
                button.addEventListener('click', e => {
                    const element = e.target.classList.contains('.download-file-btn') ? e
                        .target : e.target.closest('.download-file-btn')
                    console.log(element)
                    ArtisanApp.downloadFromUrl(element.dataset.url, element.dataset
                        .filename)
                })
            });
        };
        return {
            init: function() {
                attachEvents();
            },
            onFileChange: function(files) {
                files.length > 0 ? optionsWrapper.classList.remove('d-none') : optionsWrapper.classList.add(
                    'd-none')
            },
        }
    }();
    <?php if (isset($_POST['submit'])): ?>
        document.addEventListener("DOMContentLoaded", function(event) {
            APP.init();
        });
    <?php endif ?>
</script>