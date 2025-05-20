<?php
include('helper/strings.php');
include('helper/helpers.php');

$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );

$nl2br = true;

if(!empty($_POST)) {
    // $validated = $request->validate([
    //     'string' => "required_without:file|max_words:{$tool->wc_tool}",
    //     'file' => 'nullable|mimes:txt'
    // ]);

    $string = test_input($_POST["string"]);
    $fileName = $_FILES["file"]["tmp_name"];

    if ($fileName) {
        $content = file_get_contents($fileName);
        $content = strval(trim($content));
    } else {
        $content = $string;
    }

    if (!isDecimal($content)) {
        // return redirect()->back()->withError(__('tools.notDecimalMsg'));
        $errors['invalid'] = 'Input is not valid Decimal';
    }

    $converted_text = DecimalToBinary($content);
    
    $results = [
        'string' => $content,
        'converted_text' => $converted_text
    ];

}

function DecimalToBinary($string)
    {
        $str = '';
        $char = explode(" ", $string);
        foreach ($char as $ch) {
            $str .= decbin($ch) . ' ';
        }

        return trim($str);
    }

?>
<script src="<?php echo $plug_fl; ?>js/custom.js"></script>

    <form method="post" action="" enctype="multipart/form-data">
        <div class="row custom-textarea-wrapper">
            <div class="col-md-12 mb-4">
                <label class="h4">Enter or paste your Decimal</label> <span><?php echo $errors['invalid'] ?? null; ?></span>
                <div class="custom-textarea p-3">
                    <div class="form-group relative">
                        <textarea type="text" name="string" class="form-control transparent" rows="8"
                            placeholder="Paste Text Herer" id="string" autofocus><?php echo $results['string'] ?? old('string') ?></textarea>
                    </div>
                    <div class="d-flex">
                        <input type="file" name="file" id="file" accept=".txt" />
                    </div>
                    <hr class="my-1">

                </div>
                <x-input-error :messages="$errors->get('string')" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-end">
                <button type="submit" name="submit" class="btn btn-outline-primary rounded-pill">
                Convert to Binary
                </button>
            </div>
        </div>
    </form>

<?php if(isset($_POST['submit'])): ?>
    <div class="tool-results-wrapper">
            <div class="tool-results result mt-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box-shadow tabbar mb-3">
                            <div id="binaryText" class="large-text-scroller printable-result">
                                <?php $nl2br ? nl2br($results['converted_text']) : $results['converted_text'] ?>
                            </div>
                            <textarea class="d-none" id="save-to-file"><?php echo $results['converted_text'] ?></textarea>
                        </div>
                        <div class="result-copy mt-3 text-end">
                            <button class="btn btn-primary rounded-pill" type="button"
                                onclick="downloadAsTxt(document.getElementById('save-to-file').value, 'ascii2binary')"
                                >
                                Save As TXT
                            </button>
                            <x-copy-target target="binaryText" :text="__('common.copyToClipboard')" :svg="false" />
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <?php endif ?>


        <script>
            const APP = function() {
                let editorInstance = document.getElementById('string');
                function attachEvents () {
                        document.getElementById('file').addEventListener('change', e => {
                            var file = document.getElementById("file").files[0];
                            if (file.type != "text/plain") {
                                // ArtisanApp.toastError("{{ __('common.invalidFile') }}");
                                return;
                            }
                            APP.setFileContent(file);
                        });

                    };

                return {
                    init: function() {
                        attachEvents()
                    },
                    setFileContent: function(file) {
                        var reader = new FileReader();
                        reader.readAsText(file, "UTF-8");
                        reader.onload = function(evt) {
                            editorInstance.value = evt.target.result;
                        }
                        reader.onerror = function(evt) {
                            // ArtisanApp.toastError("error reading file");
                        }
                    },
                }
            }()
            document.addEventListener("DOMContentLoaded", function(event) {
                APP.init();
            });
        </script>

