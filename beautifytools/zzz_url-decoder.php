

 <link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/url_decoder.css" media="all"/>
<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/common.css" media="all"/></head>

        
        <div class="row">
        	<div class="col-md-12">
            	<p>Url Decoder decodes a URL that has been url encoded. Decode an encoded url using Url Decoder.</p>
                <div class="well well-sm">
                	<form class="form-horizontal url_decoder_form" action="#" method="post">
                        <fieldset>
                        
                        <!-- Textarea -->
                        <div class="form-group">
                          <div class="col-md-12">                     
                            <textarea style="height:250px;" class="form-control" id="encoded_url" name="encoded_url"></textarea>
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
<script src="<?php echo $plug_fl; ?>js/url_decoder.js"></script>
<script src="<?php echo $plug_fl; ?>js/common.js"></script>


