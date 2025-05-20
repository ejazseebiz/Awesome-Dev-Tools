<?php
include('helper/strings.php');
if (!empty($_POST)) {

    require_once('vendors/Carbon/autoload.php');



    $year = test_input($_POST['birth_year']);
    $month = test_input($_POST['birth_month']);
    $day = test_input($_POST['birth_day']);
    $year2 = test_input($_POST['from_year']);
    $month2 = test_input($_POST['from_month']);
    $day2 = test_input($_POST['from_day']);

    //  $from = Carbon\Carbon::parse("{$year}-{$month}-{$day}");
    //  $to = Carbon\Carbon::parse("{$year2}-{$month2}-{$day2}");

    // Create Carbon instances for two dates
    $from = Carbon\Carbon::createFromDate($year, $month, $day);
    $to = Carbon\Carbon::createFromDate($year2, $month2, $day2);


    $dob = $from->diff($to);
    $results['dob'] = $dob;
    $results['from'] = $from;
    $results['to'] = $to;
    $results['years'] = 'Your Age: ' .  $from->diffInYears($to) . ' Years old';
    $results['current'] = 'Your Age is ' .  $dob->y . ' Years ' .  $dob->m . ' Months ' . $dob->d . ' Days';
    $results['months'] = 'Your Age is ' .  $from->diffInMonths($to) . " Months " . $dob->d . " Days";
    $results['weeks'] = 'Your Age is ' . $from->diffInWeeks($to);
    $results['days'] = 'Your Age is ' .  $from->diffInDays($to);
    $results['hours'] = 'Your Age is ' . $from->diffInHours($to);
    $results['minutes'] = 'Your Age is ' .  $from->diffInMinutes($to);
    $results['seconds'] = 'Your Age is ' .  $from->diffInSeconds($to);
}
?>
<div class="card">
    <form id="frmAgeCalc" class="no-app-loader" method="post" action="">
        <div class="box-shadow tabbar mb-3">
            <div class="row">
                <div class="col-md-12">
                    <h3>Birth Date</h3>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Year</label>
                        <select name="birth_year" id="year" required class="form-control form-select"></select>
                    </div>
                    <x-input-error :messages="$errors->get('birth_year')" class="mt-2" />
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Month</label>
                        <select name="birth_month" id="month" required
                            class="form-control form-select"></select>
                    </div>
                    <x-input-error :messages="$errors->get('birth_month')" class="mt-2" />
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Day</label>
                        <select name="birth_day" id="day" required class="form-control form-select"></select>
                    </div>
                    <x-input-error :messages="$errors->get('birth_day')" class="mt-2" />
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-12">
                    <h3>Date From</h3>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="form-group">
                        <label>Year</label>
                        <select name="from_year" id="from_year" required class="form-control form-select"></select>
                    </div>
                    <x-input-error :messages="$errors->get('from_year')" class="mt-2" />
                </div>
                <div class="col-md-4 mb-3">
                    <div class="form-group">
                        <label>Month</label>
                        <select name="from_month" id="from_month" required
                            class="form-control form-select"></select>
                    </div>
                    <x-input-error :messages="$errors->get('from_month')" class="mt-2" />
                </div>
                <div class="col-md-4 mb-3">
                    <div class="form-group">
                        <label>Day</label>
                        <select name="from_day" id="from_day" required class="form-control form-select"></select>
                    </div>
                    <x-input-error :messages="$errors->get('from_day')" class="mt-2" />
                </div>
            </div>
        </div>

        <div class="row mt-4 mb-4">
            <div class="col-md-12 text-end">
                <button type="submit" name="submit" id="btnSubmit" class="btn btn-primary rounded-pill">
                    Calculate Age
                </button>
            </div>
        </div>
    </form>

    <?php if (isset($_POST['submit'])): ?>

        <div class="result mt-4">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="h2 mb-4" id="add_in_years"><?php echo $results['years'] ?></h3>
                </div>
                <div class="col-md-12 result-printable">
                    <table class="table table-style mb-0">
                        <tbody>
                            <tr>
                                <th>Current Age</th>
                                <td>
                                    <div class="text-break" id="age"><?php echo $results['current'] ?></div>
                                </td>
                                <td class="d-print-none">
                                    <x-copy-target target="age" />
                                </td>
                            </tr>
                            <tr>
                                <th>Age In Months</th>
                                <td>
                                    <div class="text-break" id="age_months"><?php echo $results['months'] ?></div>
                                </td>
                                <td class="d-print-none">
                                    <x-copy-target target="age_months" />
                                </td>
                            </tr>
                            <tr>
                                <th>Age In Weeks</th>
                                <td>
                                    <div class="text-break" id="age_weeks"><?php echo $results['weeks'] ?> weeks</div>
                                </td>
                                <td class="d-print-none">
                                    <x-copy-target target="age_weeks" />
                                </td>
                            </tr>
                            <tr>
                                <th>Age In Days</th>
                                <td>
                                    <div class="text-break" id="age_days"><?php echo $results['days'] ?> days</div>
                                </td>
                                <td class="d-print-none">
                                    <x-copy-target target="age_days" />
                                </td>
                            </tr>
                            <tr>
                                <th>Age In Hours</th>
                                <td>
                                    <div class="text-break" id="age_hours"><?php echo $results['hours'] ?> hours</div>
                                </td>
                                <td class="d-print-none">
                                    <x-copy-target target="age_hours" />
                                </td>
                            </tr>
                            <tr>
                                <th>Age In Min</th>
                                <td>
                                    <div class="text-break" id="age_min"><?php echo $results['minutes'] ?> minutes</div>
                                </td>
                                <td class="d-print-none">
                                    <x-copy-target target="age_min" />
                                </td>
                            </tr>
                            <tr>
                                <th>Age In Sec</th>
                                <td>
                                    <div class="text-break" id="age_sec"><?php echo $results['seconds'] ?> seconds</div>
                                </td>
                                <td class="d-print-none">
                                    <x-copy-target target="age_sec" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- <div class="col-md-12 text-end d-print-none">
                        <button
                            onclick="ArtisanApp.printResult(document.querySelector('.result-printable'), {title: '{{ $tool->name }}'})"
                            :text="__('tools.printResult')" />
                    </div> -->
            </div>
        </div>

    <?php endif ?>
</div>



<script>
    const APP = function() {
        const monthNumbers = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
        const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September",
            "October", "November", "December"
        ];
        const totalYears = 200;
        const selectYear = document.getElementById("year");
        const selectMonth = document.getElementById("month");
        const selectDay = document.getElementById("day");
        const selectYear2 = document.getElementById("from_year");
        const selectMonth2 = document.getElementById("from_month");
        const selectDay2 = document.getElementById("from_day");

        const initDate = function() {
                var currentYear = new Date().getFullYear();
                for (var y = 0; y < totalYears; y++) {
                    let date = new Date(currentYear);
                    var yearElem = document.createElement("option");
                    yearElem.value = currentYear
                    yearElem.textContent = currentYear;
                    selectYear.append(yearElem)
                    currentYear--;
                }

                for (var m = 0; m < 12; m++) {
                    let month = months[m];
                    var monthElem = document.createElement("option");
                    monthElem.value = m;
                    monthElem.textContent = month;
                    selectMonth.append(monthElem)
                }

                var d = new Date();
                var year = <?php echo isset($year) ? $year : 'd.getFullYear()' ?>;
                var month = <?php echo isset($month) ? $month : 'd.getMonth()' ?>;
                var day = <?php echo isset($day) ? $day : 'd.getDate()' ?>;
                selectYear.addEventListener("change", AdjustDays);
                selectMonth.addEventListener("change", AdjustDays);
                selectYear.value = year;
                selectMonth.value = month;
                AdjustDays();
                selectDay.value = day

                function AdjustDays() {
                    var year = selectYear.value;
                    var month = parseInt(selectMonth.value) + 1;
                    var currentVal = selectDay.value;
                    removeAll(selectDay)
                    var days = new Date(year, month, 0).getDate();
                    for (var d = 1; d <= days; d++) {
                        var dayElem = document.createElement("option");
                        dayElem.value = d;
                        if (currentVal == d) {
                            dayElem.setAttribute('selected', 'selected');
                        } else if (d < currentVal) {
                            dayElem.setAttribute('selected', 'selected');
                        }
                        dayElem.textContent = d;
                        selectDay.append(dayElem);
                    }
                }
            },
            initDate2 = function() {
                var currentYear = new Date().getFullYear();
                for (var y = 0; y < totalYears; y++) {
                    let date = new Date(currentYear);
                    var yearElem = document.createElement("option");
                    yearElem.value = currentYear
                    yearElem.textContent = currentYear;
                    selectYear2.append(yearElem)
                    currentYear--;
                }

                for (var m = 0; m < 12; m++) {
                    let month = months[m];
                    var monthElem = document.createElement("option");
                    monthElem.value = m;
                    monthElem.textContent = month;
                    selectMonth2.append(monthElem)
                }

                var d = new Date();
                var year = <?php echo isset($year2) ? $year2 : 'd.getFullYear()' ?>;
                var month = <?php echo isset($month2) ? $month2 : 'd.getMonth()' ?>;
                var day = <?php echo isset($day2) ? $day2 : 'd.getDate()' ?>;
                selectYear2.value = year;
                selectYear2.addEventListener("change", AdjustDays);
                selectMonth2.value = month;
                selectMonth2.addEventListener("change", AdjustDays);
                AdjustDays();
                selectDay2.value = day

                function AdjustDays() {
                    var year = selectYear2.value;
                    var month = parseInt(selectMonth2.value) + 1;
                    var currentVal = selectDay2.value;
                    removeAll(selectDay2)
                    var days = new Date(year, month, 0).getDate();
                    for (var d = 1; d <= days; d++) {
                        var dayElem = document.createElement("option");
                        dayElem.value = d;
                        if (currentVal == d) {
                            dayElem.setAttribute('selected', 'selected');
                        } else if (d < currentVal) {
                            dayElem.setAttribute('selected', 'selected');
                        }
                        dayElem.textContent = d;
                        selectDay2.append(dayElem);
                    }
                }
            },
            removeAll = function(selectBox) {
                while (selectBox.options.length > 0) {
                    selectBox.remove(0);
                }
            };

        return {
            init: function() {
                initDate()
                initDate2()
                const form = document.getElementById('frmAgeCalc')
                form.addEventListener('submit', function(e) {
                    if (selectYear.value > selectYear2.value) {
                        // ArtisanApp.toastError('{{ __('tools.AgeCalcGreaterError') }}');
                        e.preventDefault();
                        return false
                    }

                    if (selectYear.value == selectYear2.value) {
                        if (selectMonth.value > selectMonth2.value) {
                            // ArtisanApp.toastError('{{ __('tools.AgeCalcGreaterError') }}');
                            e.preventDefault();
                            return false
                        } else if (selectDay.value > selectDay2.value) {
                            // ArtisanApp.toastError('{{ __('tools.AgeCalcGreaterError') }}');
                            e.preventDefault();
                            return false
                        }
                    }
                    ArtisanApp.showLoader()
                });
            }
        }
    }();

    document.addEventListener("DOMContentLoaded", function(event) {
        APP.init();
    });
</script>