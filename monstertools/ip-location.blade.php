<div class="application-tools-wrapper">
    <div class="tool-wrapper">

        <form method="post" action="">
            <div class="row mb-3">
                <div class="col-md-12 mt-2 mb-3">
                    <div class="form-group mb-3">
                        <h3 class="h4">@lang('tools.enterIpLimitLabel', ['count' => $tool->no_domain_tool])</h3>
                    </div>
                    <div class="form-group">
                        <textarea rows="5" class="form-control" name="ip" id="ip" required>
                            {{ $results['ip'] ?? old('ip') }}
                        </textarea>
                    </div>
                    <x-input-error :messages="$errors->get('ip')" class="mt-2" />
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12 text-end">
                    <button type="submit" class="btn btn-primary rounded-pill">
                        @lang('tools.getIpLocation')
                    </button>
                </div>
            </div>
        </form>
    </div>
    <?php if (isset($results)): ?>
    <div class="tool-results-wrapper">

        <div class="page-wrapper">
            <div class="result mt-4">
                <table class="table table-hover table-border">
                    <thead>
                        <th></th>
                        <th>@lang('tools.ip')</th>
                        <th>@lang('tools.country_code')</th>
                        <th>@lang('tools.country')</th>
                        <th>@lang('tools.region')</th>
                        <th>@lang('tools.city')</th>
                        <th>@lang('common.status')</th>
                    </thead>
                    <tbody id="results-container">

                    </tbody>
                </table>
                <div class="d-flex justify-content-center mt-3" id="loader">
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden">@lang('common.loading')</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endif

    <?php if (isset($results)): ?>
    @push('page_scripts')
    <script>
        const APP = function() {
            const ips = {
                !!$results['ipAddresses'] !!
            };
            var cursor = 0;
            const getReslut = async function() {
                    const ip = ips[cursor]
                    console.log(cursor, ip)
                    await axios.post(
                            '{{ route('
                            tool.postAction ', ['
                            tool ' => $tool->slug, '
                            action ' => '
                            get - ip - detail ']) }}', {
                                ip: ip
                            })
                        .then((res) => {
                            addResult(res.data)
                        })
                        .catch((err) => {
                            console.log(err)
                        })
                    cursor++
                    if (cursor < ips.length) {
                        getReslut()
                    } else {
                        document.getElementById('loader').classList.add('d-none')
                    }
                },
                addResult = function(res) {
                    const status = res.country_code ? '{{ __('
                    common.valid ') }}': '{{ __('
                    common.invalid ') }}'
                    const element = document.querySelector('#results-container')
                    const html = `<tr>
                                <td>${cursor+1}</td>
                                <td>${res.ip}</td>
                                <td>${res.country_code || '-'}</td>
                                <td>${res.country || '-'}</td>
                                <td>${res.region || '-'}</td>
                                <td>${res.city || '-'}</td>
                                <td>${status}</td>
                            </tr>`;

                    element.innerHTML += html
                };

            return {
                init: function() {
                    getReslut()
                }
            }
        }();
        document.addEventListener("DOMContentLoaded", function(event) {
            APP.init();
        });
    </script>
    @endpush
    @endif
</div>