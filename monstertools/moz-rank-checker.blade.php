<div class="application-tools-wrapper">
    <div class="tool-wrapper">

        <form method="post" action="">
            <div class="box-shadow my-3 py-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <h3 class="h4">@lang('tools.enterURL')</h3>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="domain" id="domain" required
                                value="{{ $results['domain'] ?? old('domain') }}" placeholder="enterOrPasteUrl')" :error="$errors->has('domain')" />
                            <x-input-error :messages="$errors->get('domain')" class="mt-2" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 text-end">
                    <button type="submit" class="btn btn-outline-primary rounded-pill">
                        @lang('tools.checkMozRank')
                    </button>
                </div>
            </div>
        </form>
    </div>
    <?php if (isset($results)): ?>
        <div class="tool-results-wrapper">

            <div class="page-wrapper">
                <div class="result">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-style mb-0">
                                <tbody id="results-container">
                                    <tr>
                                        <th>@lang('tools.givenUrl')</th>
                                        <td class="text-start ps-3">{{ $results['domain'] ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('tools.domainName')</th>
                                        <td class="text-start ps-3">
                                            {{ extractHostname($results['content']['ip'] ?? '', true) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>@lang('tools.da')</th>
                                        <td class="text-start ps-3">{{ $results['content']['da'] ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('tools.pa')</th>
                                        <td class="text-start ps-3">{{ $results['content']['pa'] ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('tools.mozRank')</th>
                                        <td class="text-start ps-3">{{ $results['content']['mr'] ?? '' }}
                                            (<a target="_blank"
                                                href="https://www.google.com/search?q=site:{{ $results['domain'] }}">@lang('tools.googleIndex')</a>
                                            , <a target="_blank"
                                                href="https://webcache.googleusercontent.com/search?q=cache:{{ $results['domain'] }}">@lang('tools.googleCache')</a>)
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php endif; ?>

</div>