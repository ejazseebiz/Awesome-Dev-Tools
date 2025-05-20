
 <link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/url_encoder.css" media="all"/>
<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/common.css" media="all"/></head>

        
        <div class="row">
        	<div class="col-md-12">
            	<p>Url Encoder encodes a url and turns it into a percent encoded string. Encode a url and create a percent encoded string using Url Encoder.</p>
                <div class="well well-sm">
                	<form class="form-horizontal url_encoder_form" action="#" method="post">
                        <fieldset>
                        
                        <!-- Textarea -->
                        <div class="form-group">
                          <div class="col-md-12">                     
                            <textarea style="height:250px;" class="form-control" id="url" name="url"></textarea>
                          </div>
                        </div>
                        
                        <!-- Button (Double) -->
                        <div class="form-group">
                          <div class="col-md-12">
                            <button id="encode" name="encode" class="btn btn-success">Encode</button>
                            <button id="clear" name="clear" class="btn btn-danger">Clear</button>
                          </div>
                        </div>
                        
                        </fieldset>
                	</form>
                </div>
                            </div>
        </div>
      
        
    

<script src="<?php echo $plug_fl; ?>js/jquery.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/url_encoder.js"></script>
<script src="<?php echo $plug_fl; ?>js/common.js"></script>

