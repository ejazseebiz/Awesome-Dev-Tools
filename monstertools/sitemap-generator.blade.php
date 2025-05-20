<div class="application-tools-wrapper">
    <x-ad-slot :advertisement="get_advert_model('above-tool')" />
    <div class="tool-wrapper">

        <form method="post" action="">
            <div class="box-shadow my-3 py-5">
                <div class="row">
                    <div class="col-md-12">
                        <label class="h4 mb-3">@lang('tools.enterWebsiteUrl')</label>
                        <input class="form-control" name="url" id="url" type="url" required
                            value="{{ $results['url'] ?? old('url') }}" placeholder="enterOrPasteUrl')" />
                        <x-input-error :messages="$errors->get('url')" />
                        <span class="text-muted small">@lang('tools.generateSitemapHelp')</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-end">
                    <button type="submit" class="btn btn btn-outline-primary rounded-pill">
                        @lang('tools.generateSitemap')
                    </button>
                </div>
            </div>
        </form>
    </div>
    @if (isset($results) && isset($results['content']))
    <div class="tool-results-wrapper">

        <div class="page-wrapper">
            <div class="tool-results">
                <div class="custom-textarea p-3">
                    <textarea id="xmlSitemap" readonly class="transparent" readonly rows="8">
                        {{ $results['content'] }}
                    </textarea>
                </div>
            </div>
            <div class="result-copy mt-3 text-end">
                <x-copy-target target="xmlSitemap" :text="__('common.copyToClipboard')" :svg="false" />
                <x-form class="download-btn d-inline-block no-app-loader" metho="post" :route="route('tool.postAction', ['tool' => $tool->slug, 'action' => 'download'])">
                    <input type="hidden" name="process_id" value="{{ $results['process_id'] }}">
                    <button class="btn btn-primary rounded-pill" type="submit">
                        @lang('tools.downloadSitemap')
                    </button>
                    </form>
            </div>
        </div>
    </div>

    <?php endif; ?>

</div>