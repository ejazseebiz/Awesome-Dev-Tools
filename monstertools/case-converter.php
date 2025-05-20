<?php
include('helper/strings.php');
include('helper/helpers.php');

if (!empty($_POST)) {
    // $validated = $request->validate([
    //     'string' => "required|min:1|max_words:{$tool->wc_tool}",
    //     'type' => 'required',
    // ]);

    // $string = test_input($_POST["string"]);
    // $fileName = $_FILES["file"]["tmp_name"];

    $string = test_input($_POST["string"]);
    $type = test_input($_POST["type"]);
    $converted_text = "";

    switch ($type) {
        case ('1'):
            $converted_text  = toggle_case($string);
            break;
        case ('2'):
            $c_text = strtolower($string);
            $converted_text  = ucfirst($c_text);
            break;
        case ('3'):
            $converted_text  = strtolower($string);
            break;
        case ('4'):
            $converted_text  = strtoupper($string);
            break;
        case ('5'):
            $c_text = strtolower($string);
            $converted_text  = ucwords($c_text);
            break;
        default:
    }

    $results = [
        'original_text' => $string,
        'converted_text' => $converted_text
    ];
}

function toggle_case($string)
{
    $toggle_string = '';
    $length = strlen($string);
    for ($i = 0; $i < $length; $i++) {
        if ($string[$i] >= 'A' && $string[$i] <= 'Z') {
            $toggle_string .= strtolower($string[$i]);
        } else if ($string[$i] >= 'a' && $string[$i] <= 'z') {
            $toggle_string .= strtoupper($string[$i]);
        } else {
            $toggle_string .= $string[$i];
        }
    }
    return $toggle_string;
}

function sentence_case($string)
{
    $sentences = preg_split('/([.?!]+)/', $string, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
    $newString = '';
    foreach ($sentences as $key => $sentence) {
        $newString .= ($key & 1) == 0 ?
            ucfirst(strtolower(trim($sentence))) :
            $sentence . ' ';
    }
    return trim($newString);
}

?>
<div class="panel-left-generator box-shadow mt-3 mb-3 py-5">
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="" enctype="multipart/form-data">
                <div class="panel-left-radio">
                    <div class="panel-left">
                        <div class="controller mb-3">
                            <div class="custom-radio-checkbox">
                                <label class="radio-checkbox-wrapper">
                                    <input type="radio" id="toggle" class="radio-checkbox-input" name="type" value="1" <?php if (isset($type) && $type == '1') {
                                                                                                                            echo "checked";
                                                                                                                        } ?> />
                                    <span class="radio-checkbox-tile">
                                        <span>toggleCase</span>
                                    </span>
                                </label>
                            </div>
                            <div class="custom-radio-checkbox">
                                <label class="radio-checkbox-wrapper">
                                    <input class="radio-checkbox-input" id="sentence" type="radio" name="type" value="2" autocomplete="off" <?php if (isset($type) && $type == '2') {
                                                                                                                                                echo "checked";
                                                                                                                                            } ?> />
                                    <span class="radio-checkbox-tile">
                                        <span>sentenceCase</span>
                                    </span>
                                </label>
                            </div>
                            <div class="custom-radio-checkbox">
                                <label class="radio-checkbox-wrapper">
                                    <input class="radio-checkbox-input" id="lower" type="radio" name="type" value="3" autocomplete="off" <?php if (isset($type) && $type == '3') {
                                                                                                                                                echo "checked";
                                                                                                                                            } ?> />
                                    <span class="radio-checkbox-tile">
                                        <span>lowerCase</span>
                                    </span>
                                </label>
                            </div>
                            <div class="custom-radio-checkbox">
                                <label class="radio-checkbox-wrapper">
                                    <input class="radio-checkbox-input" id="upper" type="radio" name="type" value="4" autocomplete="off" <?php if (isset($type) && $type == '4') {
                                                                                                                                                echo "checked";
                                                                                                                                            } ?> />
                                    <span class="radio-checkbox-tile">
                                        <span>upperCase</span>
                                    </span>
                                </label>
                            </div>
                            <div class="custom-radio-checkbox">
                                <label class="radio-checkbox-wrapper">
                                    <input class="radio-checkbox-input" id="capitalize" type="radio" name="type" value="5" autocomplete="off" <?php if (isset($type) && $type == '5') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } ?> />
                                    <span class="radio-checkbox-tile">
                                        <span>capitalizeWord</span>
                                    </span>
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary rounded-pill">
                                Generate
                            </button>
                            <?php if (isset($_POST['submit'])) : ?>
                                <button class="btn btn-primary rounded-pill mt-2" type="button" onclick="ArtisanApp.downloadAsTxt('#save-as-file', {filename: '{{ $tool->slug . '.txt' }}'})">
                                    saveAsTxt
                                </button>
                                <x-copy-target class="btn-primary mt-2" :svg="false" target="save-as-file" :text="__('common.copyToClipboard')" />
                            <?php endif ?>
                        </div>
                        <div class="textarea d-flex flex-column justify-content-between">
                            <!-- <textarea type="text" name="string" class="form-control h-50 mb-3" :placeholder="__('common.someText')" id="textarea" required autofocus>
                                {{ $results['original_text'] ?? '' }}
                            </textarea> -->

                            <textarea type="text" name="string" class="form-control h-50 mb-3" placeholder="Some Text" id="textarea" required autofocus><?php echo $results['original_text'] ?? ''; ?></textarea>
                            <x-input-error :messages="$errors->get('string')" class="mt-2" />
                            <textarea type="text" class="form-control h-50" id="save-as-file"><?php echo $results['converted_text'] ?? ''; ?></textarea>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>