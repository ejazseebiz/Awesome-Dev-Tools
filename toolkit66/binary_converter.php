<?php
include('helper/strings.php');
$textareaContent = $_POST['content'] ?? null;
$data = [];

  if(!empty($_POST)) {
      $_POST['content'] = trim(input_clean($_POST['content']));
      $_POST['type'] = in_array($_POST['type'], ['to_binary', 'to_text']) ? $_POST['type'] : 'to_binary';

      /* Check for any errors */
      $required_fields = ['content'];
      foreach($required_fields as $field) {
          if(!isset($_POST[$field]) || (isset($_POST[$field]) && empty($_POST[$field]) && $_POST[$field] != '0')) {
              echo "Field is empty";
          }
      }

    //   if(!\Altum\Csrf::check()) {
    //       Alerts::add_error(l('global.error_message.invalid_csrf_token'));
    //   }

    if(!empty($_POST)) {

          function string_to_binary($string) {
              $characters = str_split($string);

              $binary = [];
              foreach ($characters as $character) {
                  $data = unpack('H*', $character);
                  $binary[] = base_convert($data[1], 16, 2);
              }

              return implode(' ', $binary);
          }

          function binary_to_string($binary) {
              $binaries = explode(' ', $binary);

              $string = null;
              foreach ($binaries as $binary) {
                  $string .= pack('H*', dechex(bindec($binary)));
              }

              return $string;
          }

          switch($_POST['type']) {
              case 'to_binary':
                  $data['result'] = string_to_binary($_POST['content']);
                  break;

              case 'to_text':
                  $data['result'] = binary_to_string($_POST['content']);
                  break;
          }

      }
  }

  $values = [
      'content' => $_POST['content'] ?? null,
      'type' => $_POST['type'] ?? null,
  ];

  /* Prepare the View */
  $data['values'] = $values;
?>
    

    <div class="card">
        <div class="card-body">

            <form action="" method="post" role="form">
                <input type="hidden" name="token" value="" />

                <div class="form-group">
                    <label for="content"><i class="fa fa-fw fa-paragraph fa-sm text-muted mr-1"></i> Content</label>
                    <textarea id="content" name="content" class="form-control" required="required"><?= $textareaContent ?></textarea>
                </div>

                <div class="form-group">
                    <label for="type"><i class="fa fa-fw fa-sm fa-fingerprint text-muted mr-1"></i> Converter Type</label>
                    <select id="type" name="type" class="form-control" required="required">
                        <option value="to_binary" <?= $data['values']['type'] == 'to_binary' ? 'selected="selected"' : null ?>>To binary</option>
                        <option value="to_text" <?= $data['values']['type'] == 'to_text' ? 'selected="selected"' : null ?>>To text</option>
                    </select>
                </div>

                <button type="submit" name="submit" class="btn btn-block btn-primary">Submit</button>
            </form>

        </div>
    </div>

    <?php if(isset($_POST['submit'])): ?>
        <div class="mt-4">

            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <div class="d-flex justify-content-between align-items-center">
                            <label for="result"><?= $_POST['type'] == 'to_binary' ? 'Binary' : 'Text' ?></label>
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
