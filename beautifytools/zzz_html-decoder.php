

 <link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/html_decoder.css" media="all"/>
<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/common.css" media="all"/></head>




        
        <div class="row">
        	<div class="col-md-12">
            	<p>Html Decoder decodes encoded html string and outputs pure html code. To use Html Decoder, enter an encoded html string and click Decode to get decoded html code.</p>
                <div class="well well-sm">
                	<form class="form-horizontal html_decoder_form" action="#" method="post">
                        <fieldset>
                        
                        <!-- Textarea -->
                        <div class="form-group">
                          <div class="col-md-12">                     
                            <textarea style="height:250px;" class="form-control" id="encoded_html" name="encoded_html"></textarea>
                          </div>
                        </div>
                        
                        <!-- Button (Double) -->
                        <div class="form-group">
                          <div class="col-md-12">
                            <button id="decode" name="decode" class="btn btn-success">Decode</button>
                            <button id="clear" name="clear" class="btn btn-danger">Clear</button>
                          </div>
                        </div>
                        
                        </fieldset>
                	</form>
                </div>
                       
        </div>
            </div>
    

<script src="<?php echo $plug_fl; ?>js/jquery.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/html_decoder.js"></script>
<script src="<?php echo $plug_fl; ?>js/common.js"></script>


