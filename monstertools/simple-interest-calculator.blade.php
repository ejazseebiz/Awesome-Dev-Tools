<div class="application-tools-wrapper">
    <div class="tool-wrapper">

        <form method="post" action="">
            <div class="box-shadow mb-3 py-5">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>@lang('tools.currency')</label>
                            <input class="form-control" name="currency" type="currency" id="currency" required
                                placeholder="currency')" value="{{$results['inputs']['currency'] ?? ''}}" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label>@lang('tools.startingBalance')</label>
                            <input class="form-control" name="starting_balance" type="number"
                                id="starting_balance" required placeholder="startingBalance')"
                                value="{{$results['inputs']['starting_balance'] ?? ''}}" />
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label>@lang('tools.interestRate')</label>
                            <input class="form-control" name="insterest_rate" type="number" id="insterest_rate"
                                required placeholder="interestRate')"
                                value="{{$results['inputs']['insterest_rate'] ?? ''}}" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label>@lang('tools.period')</label>
                            <select class="form-control" name="period" id="period">
                                <option value="yearly">Yearly</option>
                                <option value="monthly">Monthly</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group mb-4">
                            <label>@lang('tools.startDate')</label>
                            <input class="form-control" name="start_date" type="date" id="start_date" required
                                placeholder="startDate')"
                                value="{{$results['inputs']['start_date'] ?? ''}}" />
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="form-group mb-4">
                            <label>@lang('tools.periodOrEnd')</label>
                            <select class="form-control" name="type" id="type">
                                <option value="period">Time Period</option>
                                <option value="date">End Date</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="row" data-conditional-name="type"
                            data-conditional-value="period">
                            <div class="col-md-3">
                                <div class="form-group mb-4">
                                    <label>@lang('tools.year')</label>
                                    <input class="form-control" name="year" type="number" id="year"
                                        required placeholder="year')"
                                        value="{{$results['inputs']['year'] ?? ''}}" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-4">
                                    <label>@lang('tools.month')</label>
                                    <input class="form-control" name="month" type="number" id="month"
                                        required placeholder="month')"
                                        value="{{$results['inputs']['month'] ?? ''}}" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-4">
                                    <label>@lang('tools.week')</label>
                                    <input class="form-control" name="week" type="number" id="week"
                                        required placeholder="week')"
                                        value="{{$results['inputs']['week'] ?? ''}}" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-4">
                                    <label>@lang('tools.day')</label>
                                    <input class="form-control" name="day" type="number" id="day"
                                        required placeholder="day')"
                                        value="{{$results['inputs']['day'] ?? ''}}" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group mb-4" data-conditional-name="type"
                            data-conditional-value="date">
                            <label>@lang('tools.endDate')</label>
                            <input class="form-control" name="end_date" type="date" id="end_date" required
                                placeholder="endDate')"
                                value="{{$results['inputs']['end_date'] ?? ''}}" />
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
    <?php if (isset($results)): ?>
        <div class="tool-results-wrapper">

            <div class="page-wrapper">
                <div class="result">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-style mb-0">
                                <tbody id="results-container">
                                    <tr>
                                        <th>@lang('tools.finalBalance')</th>
                                        <th>@lang('tools.initialBalance')</th>
                                        <th>@lang('tools.interestAccrued')</th>
                                        <th>@lang('tools.monthlyIntrest')</th>
                                    </tr>
                                    <tr>
                                        <td>{{ $results['finalBalance'] . $results['inputs']['currency'] }}</td>
                                        <td>{{ $results['initialBalance'] . $results['inputs']['currency'] }}</td>
                                        <td>{{ $results['interestAccrued'] . $results['inputs']['currency'] }}</td>
                                        <td>{{ $results['monthlyIntrest'] . $results['inputs']['currency'] }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-12">
                            <table class="table table-style mb-0">
                                <tbody id="results-container">
                                    <tr>
                                        <th>@lang('tools.month')</th>
                                        <th>@lang('tools.interest')</th>
                                        <th>@lang('tools.totalInterest')</th>
                                        <th>@lang('tools.balance')</th>
                                    </tr>
                                    @php $month = $results['startDate'];
                                    $interest = $results['monthlyIntrest'];
                                    @endphp
                                    @for($i=0;$i < $results['months'] ; $i++)

                                        <tr>
                                        <td>{{ $month }}</td>
                                        <td>{{ $results['monthlyIntrest'] . $results['inputs']['currency'] }}</td>
                                        <td>{{ $interest }}</td>
                                        <td>{{ $results['initialBalance']  +  $interest}}</td>
                                        </tr>
                                        @php $month = \Carbon\Carbon::parse($month)->addMonth();
                                        $interest = $interest + $results['monthlyIntrest'];
                                        @endphp
                                        @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php endif; ?>

</div>