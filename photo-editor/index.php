<?php
$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );
?>

    <link rel="stylesheet" href="<?php echo $plug_fl; ?>style.css" />
    <link
      rel="stylesheet"
      href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    />

    
    <main class="container disable" id="container">

      <div class="wrapper">
        <!-- all the features  -->
        <div class="panel">
          <div class="filter">
            <label class="title">Filters</label>
            <div class="options">
              <button class="active" id="brightness">Brightness</button>
              <button id="saturation">Saturation</button>
              <button id="inversion">Inversion</button>
              <button id="grayscale">Grayscale</button>
            </div>
            <div class="slider">
              <div class="filter-info">
                <p class="name" id="slider-name">Brightness</p>
                <p class="value" id="slider-value">100%</p>
              </div>
              <input type="range" value="100" min="0" max="200" id="slider" />
            </div>
          </div>
          <div class="rotate">
            <label class="title">Rotate & Flip</label>
            <div class="options">
              <button id="left"><i class="fa-solid fa-rotate-left"></i></button>
              <button id="right">
                <i class="fa-solid fa-rotate-right"></i>
              </button>
              <button id="horizontal">
                <i class="bx bx-reflect-vertical"></i>
              </button>
              <button id="vertical">
                <i class="bx bx-reflect-horizontal"></i>
              </button>
            </div>
          </div>
        </div>
        <!-- image -->
        <div class="preview-img" id="preview-img-div">
          <img src="<?php echo $plug_fl; ?>download.svg" alt="image placeholder" id="preview-img" />
        </div>
      </div>
      <!-- controls -->
      <div class="controls">
      <div class="panel">
        <button class="reset-filter">Reset Filters</button>
      </div>
      <div class="preview-img">
        <div class="image-buttons">
          <input type="file" id="file-input" hidden />
          <button class="choose-img" id="choose-img">Choose Image</button>
          <button class="save-img">Save Image</button>
        </div>
      </div>
      </div>
    </main>
    <script src="<?php echo $plug_fl; ?>app.js"></script>

    