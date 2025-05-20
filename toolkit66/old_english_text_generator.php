<?php 

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
            'a' => "𝔞",
            'b' => "𝔟",
            'c' => "𝔠",
            'd' => "𝔡",
            'e' => "𝔢",
            'f' => "𝔣",
            'g' => "𝔤",
            'h' => "𝔥",
            'i' => "𝔦",
            'j' => "𝔧",
            'k' => "𝔨",
            'l' => "𝔩",
            'm' => "𝔪",
            'n' => "𝔫",
            'o' => "𝔬",
            'p' => "𝔭",
            'q' => "𝔮",
            'r' => "𝔯",
            's' => "𝔰",
            't' => "𝔱",
            'u' => "𝔲",
            'v' => "𝔳",
            'w' => "𝔴",
            'x' => "𝔵",
            'y' => "𝔶",
            'z' => "𝔷",
            'A' => "𝔄",
            'B' => "𝔅",
            'C' => "ℭ",
            'D' => "𝔇",
            'E' => "𝔈",
            'F' => "𝔉",
            'G' => "𝔊",
            'H' => "ℌ",
            'I' => "ℑ",
            'J' => "𝔍",
            'K' => "𝔎",
            'L' => "𝔏",
            'M' => "𝔐",
            'N' => "𝔑",
            'O' => "𝔒",
            'P' => "𝔓",
            'Q' => "𝔔",
            'R' => "ℜ",
            'S' => "𝔖",
            'T' => "𝔗",
            'U' => "𝔘",
            'V' => "𝔙",
            'W' => "𝔚",
            'X' => "𝔛",
            'Y' => "𝔜",
            'Z' => "ℨ",
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
