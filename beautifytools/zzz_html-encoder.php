

 <link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/html_encoder.css" media="all"/>
<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/common.css" media="all"/></head>

        
        <div class="row">
        	<div class="col-md-12">
            	<p>Html Encoder encodes html string and outputs browser uninterpretable html code. Encode html string using Html Encoder and get browser uninterpretable html code. Use encoded html string in your html code where the html code is needed to be shown as normal text.</p>
                <div class="well well-sm">
                	<form class="form-horizontal html_encoder_form" action="#" method="post">
                        <fieldset>
                        
                        <!-- Textarea -->
                        <div class="form-group">
                          <div class="col-md-12">                     
                            <textarea style="height:250px;" class="form-control" id="encode_html" name="encode_html"></textarea>
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
<script src="<?php echo $plug_fl; ?>js/html_encoder.js"></script>
<script src="<?php echo $plug_fl; ?>js/common.js"></script>


