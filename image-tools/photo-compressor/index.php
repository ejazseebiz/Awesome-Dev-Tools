<?php
$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );
?>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
  
    <!-- Main CSS -->
    <link rel="stylesheet" href="<?php echo $plug_fl; ?>styles.css" />

    
    <!-- header -->
    
<div class="card">

    <!-- container -->
    <div class="container">
        <div class="input">
            <button class="upload">Upload</button>
            <ul class="metadata">
                <li class="item">Name: <span></span></li>
                <li class="item">Dimension: <span></span></li>
                <li class="item">Size: <span></span></li>
            </ul>
        </div>
        <div class="output">
            <button class="download">Download</button>
            <ul class="metadata">
                <li class="item">Compressed: <span></span></li>
                <li class="item">Dimension: <span></span></li>
                <li class="item">Size: <span></span></li>
            </ul>
        </div>
    </div>

    <!-- progress -->
    <div class="progress">
        <div class="track"></div>
        <input type="range" class="input-value" min="10" value="30" max="99" step="any">
    </div>

    <div id="fullName">
        <p id="imgAlt"></p>
    </div>

    <!-- refresh -->
    <div><button class="refresh" onClick="window.location.reload();"><i class="fa-solid fa-arrows-rotate"></i></button></div>

    <!-- preview -->
    <div class="preview-container">
        <input type="range" id="slider-input" min="0" max="100" step="any">
        <div class="compressed">Compressed</div>
        <div class="original">Original</div>
        <div class="bottom">
            <img src="" alt="">
        </div>
        <div class="top">
            <img src="" alt="">
        </div>
    </div>
    <input type="file" id="hidden-button" style="display: none;" accept="image/*">
    <div style="clear:both"></div>
</div>
<script src="<?php echo $plug_fl; ?>script.js"></script>
<script src="<?php echo $plug_fl; ?>compressor.js"></script>

