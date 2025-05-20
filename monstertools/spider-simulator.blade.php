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
                                value="{{ $results['domain'] ?? old('domain') }}" placeholder="enterWebsiteUrl')" :error="$errors->has('domain')" />
                            <x-input-error :messages="$errors->get('domain')" class="mt-2" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 text-end">
                    <button type="submit" class="btn btn-outline-primary rounded-pill">
                        @lang('tools.simulateUrl')
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
                                        <td class="text-start ps-3">
                                            {{ $results['domain'] ?? '' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>@lang('tools.domainName')</th>
                                        <td class="text-start ps-3">
                                            {{ extractHostname($results['domain'] ?? '', true) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>@lang('tools.metaTitle')</th>
                                        <td class="text-start ps-3">
                                            {{ $results['result']['title'] ?? '' }}
                                        </td>
                                    </tr>
                                    @if (!empty($results['result']['keywords']))
                                    <tr>
                                        <th>@lang('tools.metaKeywords')</th>
                                        <td class="text-start ps-3">
                                            {{ $results['result']['keywords'] ?? '' }}
                                        </td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <th>@lang('seo.metaDescription')</th>
                                        <td class="text-start ps-3">
                                            {{ $results['result']['description'] ?? '' }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12">
                            <div class="box-shadow mxh-350 overflow-auto">
                                {!! $results['result']['text'] ?? '' !!}
                            </div>
                        </div>
                    </div>
                    <div class="border-top p-3">
                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    @if ($results['result']['links']['internal'] > 0)
                                    <div class="col-md-12 mt-3">
                                        <h3 class="text-center">
                                            @lang('tools.internalLinksCount', ['links' => $results['result']['links']['internal'] ?? '0'])
                                        </h3>
                                    </div>
                                    <div class="col-md-12">
                                        <table class="table table-style">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>@lang('tools.link')</th>
                                                    <th>@lang('tools.name')</th>
                                                    <th width="120">@lang('tools.nofollowDofollow')</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (count($results['result']['links']['links']) > 0)
                                                @foreach ($results['result']['links']['links'] as $links)
                                                @if ($links['internal'] == true)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $links['url'] }}</td>
                                                    <td>
                                                        {{ !empty($links['content']) ? $links['content'] : '' }}
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="fw-bold {{ $links['nofollow'] == true ? 'text-danger' : 'text-success' }}">
                                                            {{ $links['nofollow'] == true ? __('tools.noFoolow') : __('tools.doFollow') }}
                                                        </span>
                                                    </td>
                                                </tr>
                                                @endif
                                                @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    @endif
                                    @if ($results['result']['links']['external'] > 0)
                                    <div class="col-md-12 mt-3">
                                        <h3 class="text-center">
                                            @lang('tools.externalLinksCount', ['links' => $results['result']['links']['external'] ?? '0'])
                                        </h3>
                                    </div>
                                    <div class="col-md-12">
                                        <table class="table table-style">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>@lang('tools.link')</th>
                                                    <th>@lang('tools.name')</th>
                                                    <th width="120">@lang('tools.nofollowDofollow')</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (count($results['result']['links']['links']) > 0)
                                                @foreach ($results['result']['links']['links'] as $links)
                                                @if ($links['internal'] == false)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $links['url'] }}</td>
                                                    <td>
                                                        {{ !empty($links['content']) ? $links['content'] : '' }}
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="fw-bold {{ $links['nofollow'] == true ? 'text-danger' : 'text-success' }}">
                                                            {{ $links['nofollow'] == true ? __('tools.noFoolow') : __('tools.doFollow') }}
                                                        </span>
                                                    </td>
                                                </tr>
                                                @endif
                                                @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php endif; ?>

</div>