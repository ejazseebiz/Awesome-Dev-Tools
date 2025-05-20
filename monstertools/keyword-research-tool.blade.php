<div class="application-tools-wrapper">
    <div class="tool-wrapper">

        <form method="post" action="">
            <div class="box-shadow my-3 py-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label class="form-label h4" for="url">@lang('tools.enterURL')</label>
                            <input type="text" class="form-control" name="url" id="url" required
                                value="{{ $results['url'] ?? old('url') }}" placeholder="enterWebsiteUrl')" :error="$errors->has('url')" />
                            <x-input-error :messages="$errors->get('url')" class="mt-2" />
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12 text-end">
                    <button type="submit" class="btn btn-outline-primary rounded-pill">
                        @lang('tools.researchKeyword')
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
                    <div class="col-md-12 table-responsive">
                        <table class="table table-style mb-0" id="">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('tools.keyword')</th>
                                </tr>
                            </thead>
                            <tbody id="">
                                @foreach ($results['top'] as $top)
                                <tr>
                                    <td class="text-start ps-3">{{ $loop->iteration }}</td>

                                    <td class="text-start ps-3">
                                        {{ $top['keyword'] }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @endif


</div>