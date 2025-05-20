
 <link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/image_to_base64_converter.css" media="all"/>
<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/common.css" media="all"/></head>




        
        <div class="row">
        	<div class="col-md-12">
            	<p>Convert an image to base64 string using Image To Base64 Converter and use converted base64 string in CSS, HTML etc. Convert an image to base64 string. Image To Base64 Converter takes an image from a url or a computer and converts it to base64 image string. It also generates code for embedding base64 encoded image in HTML and CSS.</p>
                <div class="well well-sm">
                	                	<form class="form-horizontal" enctype="multipart/form-data" action="#" method="post">
                        <fieldset>
                        
                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="url">Enter image url</label>  
                          <div class="col-md-8">
                          <input id="url" name="url" type="text" placeholder="" class="form-control input-md">
                            
                          </div>
                        </div>
                        
                        <!-- File Button --> 
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="image">Or select an image from computer</label>
                          <div class="col-md-8">
                            <input id="image" name="image" class="input-file" type="file">
                          </div>
                        </div>
                        
                        <!-- Button (Double) -->
                        <div class="form-group">
                          <div class="col-md-12">
                            <button type="submit" id="convert" name="convert" class="btn btn-success">Convert</button>
                            <button id="clear" name="clear" class="btn btn-danger">Clear</button>
                          </div>
                        </div>
                        
                        </fieldset>
                	</form>
                </div>
            </div>
        </div>
            
        
    

<script src="<?php echo $plug_fl; ?>js/jquery.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/image_to_base64_converter.js"></script>
<script src="<?php echo $plug_fl; ?>js/common.js"></script>


