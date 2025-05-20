<?php
include('helper/helpers.php');

if(!empty($_POST)) {
$numbers = $_POST["number"];
$count = count($numbers);
$sum  = array_sum($numbers);
$average = array_sum($numbers) / count($numbers);
$geomatric_sum = geometric_mean($numbers);
$harmonic_mean = harmonic_mean($numbers);
$median = median($numbers);
$largest = max($numbers);
$smallest = min($numbers);
$range = $largest - $smallest;

$results = [
    'numbers' => $numbers,
    'count' => $count,
    'sum'  => $sum,
    'average' => $average,
    'geomatric_sum' => $geomatric_sum,
    'harmonic_mean' => $harmonic_mean,
    'median' => $median,
    'largest' => $largest,
    'smallest' => $smallest,
    'range' => $range,
];

}
?>
        <form method="post" action="">
            <div class="box-shadow mb-3">
                <div class="row" id="extra_fields">
                <?php if(isset($_POST['submit'])): ?>
                       <?php foreach ($results['numbers'] as $index => $num): ?>
                            <div class="col-md-6" id="remove_div_<?php echo $index+1 ?>">
                                <div class="input-icon mb-3">
                                    <span class="icon">
                                        <i class="an an-long-arrow-up text-muted"></i>
                                    </span>
                                    <input class="form-control" name="number[]" type="number" step="0.01" :error="$errors->has('number')"
                                        required placeholder="#:" value="<?php echo $num ?>" />
                                    <i class="an an-times-circle text-danger remove-field-icon"
                                        onclick="APP.removeField(<?php echo $index+1 ?>)" class="remove-field-icon">x</i>
                                    <x-input-error :messages="$errors->get('number')" />
                                </div>
                            </div>
                        <?php endforeach ?>
                        <?php else: ?>
                            <?php for ($i = 1; $i <= 4; $i++): ?>
                            <div class="col-md-6" id="remove_div_<?php echo $i ?>">
                                <div class="input-icon mb-3">
                                    <span class="icon">
                                        <i class="an an-long-arrow-up text-muted"></i>
                                    </span>
                                    <input class="form-control" name="number[]" type="number" step="0.01" :error="$errors->has('number')"
                                        required placeholder="#:" />
                                    <i class="an an-times-circle text-danger remove-field-icon"
                                        onclick="APP.removeField(<?php echo $i ?>)" class="remove-field-icon">x</i>
                                    <x-input-error :messages="$errors->get('number')" />
                                </div>
                            </div>
                        <?php endfor ?>
                    <?php endif ?>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <button type="button" class="btn btn-primary rounded-pill ps-5 pe-5 mt-3"
                            id="add_more_fields">
                            Add More
                        </button>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 text-end">
                    <button type="submit" name="submit" class="btn btn-outline-primary rounded-pill">
                        Generate
                    </button>
                </div>
            </div>
        </form>

        
        <?php if(isset($_POST['submit'])): ?>
        <div class="tool-results-wrapper">

                <div class="result mt-4">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-style mb-0">
                                <tbody>
                                    <tr>
                                        <th width="200">Count</th>
                                        <td class="text-start ps-3">
                                            <div class="text-break">
                                                <?php echo $results['count'] ?>
                                            </div>
                                        </td>
                                        <td>
                                            <x-copy-text :text="$results['count']" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Average</th>
                                        <td class="text-start ps-3">
                                            <div class="text-break">
                                                <?php echo $results['average'] ?>
                                            </div>
                                        </td>
                                        <td>
                                            <x-copy-text :text="$results['average']" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Geomatric Mean</th>
                                        <td class="text-start ps-3">
                                            <div class="text-break">
                                                <?php echo $results['geomatric_sum'] ?>
                                            </div>
                                        </td>
                                        <td>
                                            <x-copy-text :text="$results['geomatric_sum']" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Harmonic Mean</th>
                                        <td class="text-start ps-3">
                                            <div class="text-break">
                                                <?php echo $results['harmonic_mean'] ?>
                                            </div>
                                        </td>
                                        <td>
                                            <x-copy-text :text="$results['harmonic_mean']" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Mdian</th>
                                        <td class="text-start ps-3">
                                            <div class="text-break">
                                                <?php echo $results['median'] ?>
                                            </div>
                                        </td>
                                        <td>
                                            <x-copy-text :text="$results['median']" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Largest</th>
                                        <td class="text-start ps-3">
                                            <div class="text-break">
                                                <?php echo $results['largest'] ?>
                                            </div>
                                        </td>
                                        <td>
                                            <x-copy-text :text="$results['largest']" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Smallest</th>
                                        <td class="text-start ps-3">
                                            <div class="text-break">
                                                <?php echo $results['smallest']?>
                                            </div>
                                        </td>
                                        <td>
                                            <x-copy-text :text="$results['smallest']" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Range</th>
                                        <td class="text-start ps-3">
                                            <div class="text-break">
                                                <?php echo $results['range'] ?>
                                            </div>
                                        </td>
                                        <td>
                                            <x-copy-text :text="$results['range']" />
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
      
        </div>
        <?php endif ?>

        <script>
            const APP = function() {
                const maxField = 50;
                const addButton = document.getElementById('add_more_fields');
                var cursor = <?php echo isset($results['numbers']) ? count($results['numbers']) + 1 : 5 ?>;
                const attachEvents = function() {
                        addButton.addEventListener("click", () => {
                            addField()
                        });
                    },
                    addField = function() {
                        if (cursor > maxField) return;
                        var wrapper = document.getElementById('extra_fields');
                        var fieldElement = `<div class="input-icon mb-3">
                                            <span class="icon"><i class="an an-long-arrow-up text-muted"></i></span>
                                            <input class="form-control" name="number[]" type="number" step="0.01" placeholder="#:" required />
                                            <i class="an an-times-circle text-danger remove-field-icon" onclick="APP.removeField(${cursor})" class="remove-field-icon">x</i>
                                        </div>`;
                        var tempNode = document.createElement('div');
                        tempNode.className = 'col-md-6'
                        tempNode.id = `remove_div_${cursor}`
                        tempNode.innerHTML = fieldElement;
                        wrapper.appendChild(tempNode)
                        tempNode.querySelector('input').focus()
                        if (cursor == maxField) addButton.classList.add('d-none');
                        cursor++;
                    };

                return {
                    init: function() {
                        attachEvents();
                    },
                    removeField: function(id) {
                        if (3 < cursor) {
                            document.getElementById("remove_div_" + id).remove();
                            cursor--;
                        }
                    }
                };

            }();
            document.addEventListener("DOMContentLoaded", function(event) {
                APP.init();
            });
        </script>


