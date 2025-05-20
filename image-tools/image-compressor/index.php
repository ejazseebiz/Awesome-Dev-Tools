
<?php
$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );
?>
    <link rel="stylesheet" href="<?php echo $plug_fl; ?>/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="<?php echo $plug_fl; ?>/assets/js/Compressor.js"></script>
    <script src="<?php echo $plug_fl; ?>/assets/js/main.js" defer></script>

    
    <div id="app" class="card">
      <!-- Div containing original and compressed image -->
      <div class="app__images-div" data-clicked="false">
        <!-- Dummy Image, appears on pageload -->
        <img src="./assets/images/background.jpg" alt="dummy" style="display: none;" class="dummy-image">

        <div class="app__original-image">
          <div class="app__image-info"></div>
        </div>

        <div class="app__compressed-image-frame">
          <div class="app__compressed-image"></div>
          <div class="app__image-info"></div>
          <a href="" class="app__compressed-image__download-button" download>Download <i class="fas fa-download"></i></a>
        </div>
        <p class="app__compressed-image-frame__resize-button"><i class="fas fa-arrows-alt-h"></i></p>
      </div>
      <!-- file input -->
      <label for="app__file-input" class="btn btn-success">
        Choose file
        <input id="app__file-input" class="app__file-input" style="display: none;" type="file" accept="image/*">
      </label>
      <!-- output file type -->
      <label for="app__output-file-type-input">Output file type
        <input type="text" name='outputType' class="app__output-file-type-input" list="image-file-types" value="image/jpeg">
      </label>
      <datalist id="image-file-types">
        <option >image/jpeg</option>
        <option >image/png</option>
        <option >image/webp</option>
      </datalist>
      <!-- Range input -->
      <div id="range" data-clicked="false" class="app__range-input" name="quality">
        <div class="app__range-input__button"></div>
      </div>

      <!-- Height and width input -->
      <div class="app__grouped-inputs">
        <label>Width
          <input name="width" type="number">
        </label>
        <label>Height
          <input name="height" type="number">
        </label>
      </div>
      <!-- More options -->
      <button class="app__more-inputs-button">More options</button>
      <div class="app__more-inputs-div">
        <div class="app__grouped-inputs">
          <label>Max Width
            <input name="maxWidth" type="number">
          </label>
          <label> Max Height
            <input name="maxHeight" type="number">
          </label>
        </div>

        <div class="app__grouped-inputs">
          <label>Min Width
            <input name="minWidth" type="number">
          </label>
          <label> Min Height
            <input name="minHeight" type="number">
          </label>
        </div>
      </div>

    </div>

    