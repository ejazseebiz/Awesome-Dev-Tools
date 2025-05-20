<?php
$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/torrent_decoder.css" media="all"/>
<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/common.css" media="all"/></head>

        
<div class="card">
        	<div class="card-body">
            	<p>Torrent Decoder decodes a torrent file and shows the torrent info within a clean readable form.</p>
                <div class="well well-sm">
                	<p class="info text-danger"></p>
                	<form class="form-horizontal torrent_decoder_form" enctype="multipart/form-data" action="#" method="post">
                        <fieldset>
                        <input name="posted" type="hidden">
                        <div class="form-group">
                          <label class="col-md-2 control-label" for="torrent"></label>
                          <div class="col-md-10">
                            <input id="torrent" name="torrent" class="input-file" type="file">
                            <span class="help-block text-left">Please select a torrent file. Maximum file size should be under 1mb.</span>
                          </div>
                        </div>
                        
                        <!-- Button (Double) -->
                        <div class="form-group">
                          <div class="col-md-12">
                            <button id="decode" name="decode" class="btn btn-success">Get torrent information</button>
                          </div>
                        </div>
                        
                        </fieldset>
                	</form>
                </div>
                            </div>
        </div>
           
        

<script src="<?php echo $plug_fl; ?>js/jquery.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/torrent_decoder.js"></script>
<script src="<?php echo $plug_fl; ?>js/common.js"></script>

