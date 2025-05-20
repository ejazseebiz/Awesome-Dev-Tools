<?php
$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );
$data = [];

if(!empty($_POST)) {
    /* Check for any errors */
    $required_fields = ['text'];
    foreach($required_fields as $field) {
        if(!isset($_POST[$field]) || (isset($_POST[$field]) && empty($_POST[$field]) && $_POST[$field] != '0')) {
            echo "Field is empty";
        }
    }

    // if(!\Altum\Csrf::check()) {
    //     Alerts::add_error(l('global.error_message.invalid_csrf_token'));
    // }

    if(!empty($_POST && empty($errors))) { 
        $table = [
            '0' => "𝟢",
            '1' => "𝟣",
            '2' => "𝟤",
            '3' => "𝟥",
            '4' => "𝟦",
            '5' => "𝟧",
            '6' => "𝟨",
            '7' => "𝟩",
            '8' => "𝟪",
            '9' => "𝟫",
            'a' => "𝒶",
            'b' => "𝒷",
            'c' => "𝒸",
            'd' => "𝒹",
            'e' => "𝑒",
            'f' => "𝒻",
            'g' => "𝑔",
            'h' => "𝒽",
            'i' => "𝒾",
            'j' => "𝒿",
            'k' => "𝓀",
            'l' => "𝓁",
            'm' => "𝓂",
            'n' => "𝓃",
            'o' => "𝑜",
            'p' => "𝓅",
            'q' => "𝓆",
            'r' => "𝓇",
            's' => "𝓈",
            't' => "𝓉",
            'u' => "𝓊",
            'v' => "𝓋",
            'w' => "𝓌",
            'x' => "𝓍",
            'y' => "𝓎",
            'z' => "𝓏",
            'A' => "𝒜",
            'B' => "𝐵",
            'C' => "𝒞",
            'D' => "𝒟",
            'E' => "𝐸",
            'F' => "𝐹",
            'G' => "𝒢",
            'H' => "𝐻",
            'I' => "𝐼",
            'J' => "𝒥",
            'K' => "𝒦",
            'L' => "𝐿",
            'M' => "𝑀",
            'N' => "𝒩",
            'O' => "𝒪",
            'P' => "𝒫",
            'Q' => "𝒬",
            'R' => "𝑅",
            'S' => "𝒮",
            'T' => "𝒯",
            'U' => "𝒰",
            'V' => "𝒱",
            'W' => "𝒲",
            'X' => "𝒳",
            'Y' => "𝒴",
            'Z' => "𝒵",
        ];

        $data['result'] = '';
        for($i = 0; $i < mb_strlen($_POST['text']); $i++) {
            $character = $_POST['text'][$i];
            $data['result'] .= array_key_exists($character, $table) ? $table[$character] : $character;
        }
    }
}

$values = [
    'text' => $_POST['text'] ?? null,
];

/* Prepare the View */
$data['values'] = $values;
?>

    <div class="card">
        <div class="card-body">

            <form action="" method="post" role="form">
                <input type="hidden" name="token" value="" />

                <div class="form-group">
                    <label for="text"><i class="fa fa-fw fa-paragraph fa-sm text-muted mr-1"></i> Text</label>
                    <textarea id="text" name="text" class="form-control" required="required"><?= $data['values']['text'] ?></textarea>
                   
                    
                </div>

                <button type="submit" name="submit" class="btn btn-block btn-primary">Submit</button>
            </form>

        </div>
    </div>

    <?php if(isset($data['result'])): ?>
        <div class="mt-4">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <div class="d-flex justify-content-between align-items-center">
                            <label for="result">Result</label>
                            <div>
                                <button
                                        type="button"
                                        class="btn btn-link text-secondary"
                                        data-toggle="tooltip"
                                        title="clipboard_copy"
                                        aria-label="clipboard_copy"
                                        data-copy="clipboard_copy"
                                        data-copied="clipboard_copied"
                                        data-clipboard-target="#result"
                                        data-clipboard-text
                                >
                                    <i class="fa fa-fw fa-sm fa-copy"></i>
                                </button>
                            </div>
                        </div>
                        <textarea id="result" class="form-control"><?= $data['result'] ?></textarea>
                    </div>

                </div>
            </div>
        </div>
    <?php endif ?>


    <?php include('partials/clipboard_js.php'); ?>