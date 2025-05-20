<div class="application-tools-wrapper">
    <div class="tool-wrapper">

        <x-form id="frmProb" class="no-app-loader" method="get" :route="route('tool.handle', $tool->slug)">
            <div class="box-shadow mb-3 py-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="outcome">@lang('tools.outcome')</label>
                            <input class="form-control" name="outcome" type="number" id="outcome" required />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="event_1">@lang('tools.eventOccured')</label>
                            <input class="form-control" name="event_1" type="number" id="event_1" required />
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 text-end">
                    <button type="submit" class="btn btn-outline-primary rounded-pill" id="calculate">
                        @lang('tools.calculate')
                    </button>
                </div>
            </div>
            </form>
    </div>
    <div class="tool-result-wrapper d-none">

        <div class="page-wrapper">
            <div class="result mt-4">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-style mb-0">
                            <tbody>
                                <tr>
                                    <th>@lang('tools.eventOccurs')</th>
                                    <td>
                                        <div class="text-break" id="event-occurs"></div>
                                    </td>
                                    <td>
                                        <x-copy-target target="event-occurs" />
                                    </td>
                                </tr>
                                <tr>
                                    <th>@lang('tools.eventDonotOccurs')</th>
                                    <td>
                                        <div class="text-break" id="event-not"></div>
                                    </td>
                                    <td>
                                        <x-copy-target target="event-not" />
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('page_scripts')
    <script>
        const APP = function() {
            const resultsElem = document.querySelector('.tool-result-wrapper');
            const calculation = function() {
                    var outcome = parseFloat(document.getElementById('outcome').value);
                    var event_1 = parseFloat(document.getElementById('event_1').value);
                    if (outcome < 0 || event_1 < 0 || outcome == "" || event_1 == "") {
                        ArtisanApp.toastError('{{ __('
                            tools.invalidInput ') }}')
                        return;
                    }

                    if (outcome <= event_1) {
                        ArtisanApp.toastError('{{ __('
                            tools.outcomeGreaterMsg ') }}')
                        return;
                    }

                    var occured = event_1 / outcome;
                    var not_occured = 1 - occured;

                    document.getElementById('event-occurs').innerHTML = Math.round(occured * 100) / 100;
                    document.getElementById('event-not').innerHTML = Math.round(not_occured * 100) / 100;

                    resultsElem.classList.remove('d-none')
                    resultsElem.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                },
                attachEvents = function() {
                    document.getElementById('calculate').addEventListener('click', () => {
                        calculation()
                    })
                    document.getElementById('frmProb').addEventListener('submit', e => {
                        e.preventDefault();
                        // calculation()
                    })
                };

            return {
                init: function() {
                    attachEvents();
                }
            }
        }()
        document.addEventListener("DOMContentLoaded", function(event) {
            APP.init();
        });
    </script>
    @endpush
</div>