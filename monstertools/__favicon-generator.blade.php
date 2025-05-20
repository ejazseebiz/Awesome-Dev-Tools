<div class="application-tools-wrapper">
    <div class="tool-wrapper">

        <x-form method="post" :route="route('tool.handle', $tool->slug)" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <x-upload-wrapper max-files="1" :max-size="$tool->fs_tool" accept=".png,.jpeg,.gif,.jpg" input-name="image"
                        :file-title="__('tools.dropImageHereTitle')" :file-label="null" />
                    <x-input-error :messages="$errors->get('file')" class="mt-2" />
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 text-end">
                    <button type="submit" class="btn btn-outline-primary rounded-pill">
                        @lang('tools.generateFavicon')
                    </button>
                </div>
            </div>
            </form>
    </div>
    <?php if (isset($results)): ?>
        <div class="tool-results-wrapper">

            <div class="page-wrapper">
                <div class="row">
                    <div class="col-md-12">
                        <div class="progress" style="height: 3px;">
                            <div id="conversion-progress" class="progress-bar bg-success" role="progressbar"
                                aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-4">
                        <x-form class="download-all-btn d-inline-block no-app-loader" metho="post" :route="route('tool.postAction', ['tool' => $tool->slug, 'action' => 'download'])">
                            <input type="hidden" name="process_id" value="{{ $results['process_id'] }}">
                            <x-download-form-button :text="__('tools.downloadAll')" />
                            </form>
                    </div>
                </div>
            </div>
        </div>

    <?php endif; ?>

</div>