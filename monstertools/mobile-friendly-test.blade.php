<div class="application-tools-wrapper">
    <div class="tool-wrapper">

        <form method="post" action="">
            <div class="box-shadow my-3 py-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="url">@lang('tools.enterURL')</label>
                            <input type="text" class="form-control" name="url" id="url" required
                                value="{{ $results['url'] ?? old('url') }}" placeholder="enterWebsiteUrl')" :error="$errors->has('domain')" />
                            <x-input-error :messages="$errors->get('url')" class="mt-2" />
                        </div>
                    </div>

                </div>

            </div>

            <div class="row">
                <div class="col-md-12 text-end">
                    <button type="submit" class="btn btn-outline-primary rounded-pill">
                        @lang('tools.startTest')
                    </button>
                </div>
            </div>
        </form>
    </div>
    <?php if (isset($results)): ?>
        <div class="tool-results-wrapper">

            <div class="page-wrapper">
                <div class="result">
                    <div class="row my-4">
                        <div class="col-md-12">
                            <table class="table table-style mb-0">
                                <tbody>
                                    <tr>
                                        <td>
                                            @if ($results['mobileFriendly'])
                                            <h4 class="mb-0">@lang('tools.mobileFriendly')</h4>
                                            @else
                                            <h4 class="mb-0">@lang('tools.notMobileFriendly')</h4>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-primary" target="_blank"
                                                href="https://search.google.com/test/mobile-friendly?url={{ $results['url'] }}">@lang('tools.moreResults')</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12 mt-5">
                            <div class="d-flex justify-content-center website-screenshot-detail">
                                <div class="mobile">
                                    <div class="image">
                                        <div class="image-wrap">
                                            <img src="{{ generateScreenshotMobile($results['baseUrl']) }}"
                                                class="img-fluid screenshot" alt="{{ $tool->name }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

</div>