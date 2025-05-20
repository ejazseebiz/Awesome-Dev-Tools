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
                        @lang('tools.checkResolution')
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
                    <div class="col-md-3">
                        <label for="">@lang('tools.desktops')</label>
                        <select class="form-control screens">
                            <option value="0">@lang('tools.selectOne')</option>
                            @foreach ($results['desktops'] as $key => $desktop)
                            <option value="{{ $key }}">{{ $desktop }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="">@lang('tools.tablets')</label>
                        <select class="form-control screens">
                            <option value="0">@lang('tools.selectOne')</option>
                            @foreach ($results['tablets'] as $key => $tablet)
                            <option value="{{ $key }}">{{ $tablet }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="">@lang('tools.mobiles')</label>
                        <select class="form-control screens">
                            <option value="0">@lang('tools.selectOne')</option>
                            @foreach ($results['mobiles'] as $key => $mobile)
                            <option value="{{ $key }}">{{ $mobile }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="">@lang('tools.televisions')</label>
                        <select class="form-control screens">
                            <option value="0">@lang('tools.selectOne')</option>
                            @foreach ($results['televisions'] as $key => $television)
                            <option value="{{ $key }}">{{ $television }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 postion-relative overflow-auto">
                        <iframe id="screenFrame" name="myiframe" class="mx-auto d-block p-3 bg_2f3133"
                            scrolling="yes" height="800" width="1280" src="{{ $results['url'] }}"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    @push('page_scripts')
    <script>
        const APP = function() {

            const setResolution = function() {
                    const screens = document.querySelectorAll('.screens');
                    const iframe = document.getElementById('screenFrame');
                    screens.forEach(screen => {
                        screen.addEventListener('click', function handleClick(event) {
                            if (screen.value == 0) {
                                return;
                            }
                            var size = screen.value.split("x");
                            iframe.height = parseInt(size[1]);
                            iframe.width = parseInt(size[0]);
                            setUserAgent(iframe, "Mobile Agent");
                        });
                    });
                },
                setUserAgent = function(window, userAgent) {
                    if (window.navigator.userAgent != userAgent) {
                        var userAgentProp = {
                            get: function() {
                                return userAgent;
                            }
                        };
                        try {
                            Object.defineProperty(window.navigator, 'userAgent', userAgentProp);
                        } catch (e) {
                            window.navigator = Object.create(navigator, {
                                userAgent: userAgentProp
                            });
                        }
                    }
                };
            return {
                init: function() {
                    setResolution();
                }
            }
        }();

        document.addEventListener("DOMContentLoaded", function(event) {
            APP.init();
        });
    </script>
    @endpush
</div>