<?php
$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/base64_to_image_converter.css" media="all"/>
<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/common.css" media="all"/></head>
<div class="card">
        	<div class="card-body">
        <div class="row">
        	<div class="col-md-12">
            	<p>Base64 To Image Converter converts a base64 encoded image string into an image. It also lets you preview converted image and download.</p>
                <div class="well well-sm">
                	<form class="form-horizontal" action="#" method="post">
                        <fieldset>
                        <!-- Textarea -->
                        <div class="form-group">
                          <div class="col-md-12">
                            <textarea style="height:250px;" class="form-control" id="base64_string" name="base64_string"></textarea>
                          </div>
                        </div>
                        <!-- Button (Double) -->
                        <div class="form-group">
                          <div class="col-md-12">
                            <button id="convert" name="convert" class="btn btn-success">Convert</button>
                            <button id="clear" name="clear" class="btn btn-danger">Clear</button>
                          </div>
                        </div>
                        </fieldset>
                	</form>
                </div>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-12">
            	<div class="well well-sm data_out" style="display:none;">
                	<img id="download_img" src="#" class="img-thumbnail"><br/><br/>
                	<a href="#" id="download" download="image.png" class="btn btn-info">Download</a>
                </div>
            </div>
        </div>
</div>
</div>
<script src="<?php echo $plug_fl; ?>js/jquery.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/base64_to_image_converter.js"></script>
<script src="<?php echo $plug_fl; ?>js/common.js"></script>