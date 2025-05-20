<?php
$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/base64_encode_decode.css" media="all"/>
<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/common.css" media="all"/>

<div class="card">
        	<div class="card-body">
            	<p>Enter a string and click Encode to Base64 encode or enter an encoded string and click Decode to Base64 decode.</p>
                <div class="well well-sm">
                	<form class="form-horizontal" action="#" method="post">
                        <fieldset>
                        
                        <!-- Textarea -->
                        <div class="form-group">
                          <div class="col-md-12">                     
                            <textarea style="height:250px;" class="form-control" id="data" name="data"></textarea>
                          </div>
                        </div>
                        
                        <!-- Button (Double) -->
                        <div class="form-group">
                          <div class="col-md-12">
                            <button id="encode" name="encode" class="btn btn-success">Encode</button>
                            <button id="decode" name="decode" class="btn btn-success">Decode</button>
                          </div>
                        </div>
                        
                        </fieldset>
                	</form>
                </div>
                <div class="well well-sm out_div" style="display:none;">
                	<p><strong>Encoded / Decoded data&nbsp;:</strong></p>
                	<form class="form-horizontal" action="#" method="post">
                        <fieldset>
                        
                        <!-- Textarea -->
                        <div class="form-group">
                          <div class="col-md-12">                     
                            <textarea style="height:250px;" class="form-control" id="out" name="out"></textarea>
                          </div>
                        </div>
                        </fieldset>
                	</form>
                </div>
            </div>
        </div>

<script src="<?php echo $plug_fl; ?>js/jquery.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/base64_encode_decode.js"></script>
<script src="<?php echo $plug_fl; ?>js/common.js"></script>

