<?php
// $validated = [];
include('helper/strings.php');
if (!empty($_POST)) {
    $impression = test_input($_POST["daily_impression"]);
    $ctr = test_input($_POST["ctr"]);
    $cost = test_input($_POST["cost"]);
    // $validated = $request->validate([
    //     'daily_impression' => 'required',
    //     'ctr' => 'required',
    //     'cost' => 'required',
    // ]);

    $clicks_per_day = (($impression / 100) * $ctr);
    $clicks_per_month = $clicks_per_day * 30;
    $clicks_per_year = $clicks_per_day * 365;
    $earning_per_day = $clicks_per_day * $cost;
    $earning_per_month = 30 * $earning_per_day;
    $earning_per_year = 365 * $earning_per_day;
    $results = [
        'daily_impression' => $impression,
        'ctr' => $ctr,
        'cost' => $cost,
        'earning_per_day' => $earning_per_day,
        'earning_per_month' => $earning_per_month,
        'earning_per_year' => $earning_per_year,
        'clicks_per_day' => $clicks_per_day,
        'clicks_per_month' => $clicks_per_month,
        'clicks_per_year' => $clicks_per_year
    ];
}

?>

<form action="" method="post" role="form">
    <div class="box-shadow tabbar mb-3">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Daily Page Impression</label>
                    <input type="text" class="form-control" name="daily_impression" id="daily_impression"
                        required value="<?php echo $results['daily_impression'] ?? old('daily_impression') ?>" placeholder="100"
                        :error="$errors->has('daily_impression')" />

                </div>

            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>CTR In Percentage</label>
                    <input type="text" class="form-control" name="ctr" id="ctr" required placeholder="1.05"
                        value="<?php echo $results['ctr'] ?? old('ctr')  ?>" :error="$errors->has('ctr')" />

                </div>

            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Cost Per Click</label>
                    <input type="text" class="form-control" name="cost" id="cost" required placeholder="0.87"
                        value="<?php echo $results['cost'] ?? old('cost')  ?>" :error="$errors->has('cost')" />

                </div>

            </div>
        </div>
    </div>

    <div class="row mt-4 mb-4">
        <div class="col-md-12 text-end">
            <button type="submit" name="submit" id="calculate" class="btn btn-outline-primary rounded-pill">
                Calculate Earning
            </button>
        </div>
    </div>
</form>

<?php if (isset($_POST['submit'])): ?>

    <div class="tool-results-wrapper">

        <div class="page-wrapper">
            <div class="result mt-4">
                <div class="row">
                    <div class="col-md-12 result-printable">
                        <h3 class="mb-3 mt-4">Daily</h3>
                        <table class="table table-style mb-0">
                            <tbody>
                                <tr>
                                    <th width="150">Earnings</th>
                                    <td>$<?php echo $results['earning_per_day'] ?></td>
                                </tr>
                                <tr>
                                    <th>Clicks</th>
                                    <td><?php echo number_format($results['clicks_per_day']) ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12 result-printable">
                        <h3 class="mb-3 mt-4">Monthly</h3>
                        <table class="table table-style mb-0">
                            <tbody>
                                <tr>
                                    <th width="150">Earnings</th>
                                    <td>$<?php echo $results['earning_per_month'] ?></td>
                                </tr>
                                <tr>
                                    <th>Clicks</th>
                                    <td><?php echo number_format($results['clicks_per_month']) ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12 result-printable">
                        <h3 class="mb-3 mt-4">Yearly</h3>
                        <table class="table table-style mb-0">
                            <tbody>
                                <tr>
                                    <th width="150">Earnings</th>
                                    <td>$<?php echo $results['earning_per_year'] ?></td>
                                </tr>
                                <tr>
                                    <th>Clicks</th>
                                    <td><?php echo  number_format($results['clicks_per_year']) ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php endif ?>