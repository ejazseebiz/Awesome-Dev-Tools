<?php
$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );
?>
  <link rel="stylesheet" href="<?php echo $plug_fl; ?>style.css">

  





  <div class="wrapper card">

    <div class="upload-box">

      <input type="file" accept="image/*" hidden>
      <img src="<?php echo $plug_fl; ?>upload-icon.svg" alt="">
      <p>Upload your image!</p>

    </div>

    <div class="content">

      <div class="row sizes">

        <div class="column width">
          <label>Width</label>
          <input type="number">
        </div>

        <div class="column height">
          <label>Height</label>
          <input type="number">
        </div>

      </div>

      <div class="row checkboxes">

        <div class="column ratio">
          <input type="checkbox" id="ratio" checked>
          <label for="ratio">Lock Aspect Ratio</label>
        </div>

        <div class="column quality">
          <input type="checkbox" id="quality">
          <label for="quality">Reduce Quality</label>
        </div>

      </div>

      <div class="row buttons">

        <button class="column download-btn">Download Image</button>
        <button class="column cancel-btn">Cancel Process</button>

      </div>

    </div>

  </div>

  <script src="<?php echo $plug_fl; ?>main.js"></script>