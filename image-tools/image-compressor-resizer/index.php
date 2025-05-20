

<?php
$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );
?>

    <link rel="icon" href="icon.png" type="image/png" />
    <link rel="stylesheet" href="<?php echo $plug_fl; ?>style.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
    />
    <script
      src="https://kit.fontawesome.com/7213b39e3a.js"
      crossorigin="anonymous"
    ></script>

    
    <div class="wrapper card">
      <h3>Image Resizer - Compressor</h3>
      <div class="container imgcontainer">
        <div class="upload-box">
          <span class="material-icons">close</span>
          <input type="file" accept="image/*" hidden />
          <img src="<?php echo $plug_fl; ?>/upload-icon.svg" alt="" class="logo" />
          <img src="" alt="" class="preview" />
          <p>Browse File to Upload</p>
        </div>
        <div class="content">
          <div class="row sizes">
            <div class="column width col-md-6">
              <label>Width</label>
              <input
                type="text"
                maxlength="4"
                oninput="this.value = this.value.replace(/[^0-9]/g, '');"
              />
            </div>
            <div class="column height col-md-6">
              <label>Height</label>
              <input
                type="text"
                maxlength="4"
                oninput="this.value = this.value.replace(/[^0-9]/g, '');"
              />
            </div>
          </div>
          <small class="validation">Invalid number value</small>

          <div class="ratio">
            <input type="checkbox" id="ratio" checked />
            <label for="ratio">Lock aspect ratio</label>
          </div>
          <div class="row range">
            <div class="column quality">
              <p id="quality_value">Quality: 80% (Medium)</p>
              <input
                id="quality_range"
                type="range"
                min="10"
                max="100"
                step="1"
                value="80"
              />
              <small class="helperText">
                PNG is a lossless image compression format.
              </small>
            </div>
            <div class="column file_type">
              <p>File extension</p>
              <select id="file_type">
                <option value="jpg">.jpg</option>
                <option value="png">.png</option>
              </select>
            </div>
          </div>

          <hr style="margin: 20px 0" />
          <div class="row">
          <div class="col-md-6 current">
            <div class="column label">Current:</div>
            <div class="column details">
              <div class="pixels">800 x 515 pixels</div>
              <div class="file_size">24.5 KB</div>
              <div class="type">.jpg</div>
            </div>
          </div>
          <div class="col-md-6 new">
            <div class="column label">New:</div>
            <div class="column details">
              <div class="pixels">800 x 515 pixels</div>
              <div class="file_size">24.5 KB</div>
              <div class="type">.jpg</div>
            </div>
          </div>
</div>
          <button class="download-btn">Download</button>
        </div>
      </div>
 
      
    </div>

    <script src="<?php echo $plug_fl; ?>script.js"></script>
  </body>
</html>
