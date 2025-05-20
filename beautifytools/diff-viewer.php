<?php
$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/diffview.css" media="all"/>
<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/diff_viewer.css" media="all"/>
<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/common.css" media="all"/></head>


<div class="card">
        	<div class="card-body">
            	<p>Diff viewer compares and finds the difference between two texts or strings.</p>
                <div class="well well-sm">
                	<form class="form-horizontal url_decoder_form" action="#" method="post">
                        <fieldset>
                        
                        <!-- Textarea -->
                        <div class="form-group">
                          <div class="col-md-12">                     
                            <textarea style="height:250px;" class="form-control" id="base_txt" name="base_txt" placeholder="Please enter base text here ..."></textarea>
                          </div>
                        </div>
                        
                        <!-- Textarea -->
                        <div class="form-group">
                          <div class="col-md-12">                     
                            <textarea style="height:250px;" class="form-control" id="new_txt" name="new_txt" placeholder="Please enter new text here ..."></textarea>
                          </div>
                        </div>
                        
                        <!-- Text input-->
                        <div class="form-group"> 
                          <div class="col-md-12">
                          <input id="size" name="size" placeholder="Context size (optional)" class="form-control input-md" type="text">
                            
                          </div>
                        </div>
                        
                        <!-- Multiple Radios -->
                        <div class="form-group text-left">
                          <div class="col-md-12">
                          <div class="radio">
                            <label for="sidebyside">
                              <input name="radios" id="sidebyside" value="sidebyside" checked="checked" type="radio">
                              Side by Side Diff
                            </label>
                            </div>
                          <div class="radio">
                            <label for="inline">
                              <input name="radios" id="inline" value="inline" type="radio">
                              Inline Diff
                            </label>
                            </div>
                          </div>
                        </div>
                        
                        <!-- Button (Double) -->
                        <div class="form-group">
                          <div class="col-md-12">
                            <button id="view" name="view" class="btn btn-success">View</button>
                            <button id="clear" name="clear" class="btn btn-danger">Clear</button>
                          </div>
                        </div>
                        
                        </fieldset>
                	</form>
                </div>
                <div id="diff" style="width:100%;text-align:left;margin-bottom:15px;"></div>
            </div>
        </div>

        
    

<script src="<?php echo $plug_fl; ?>js/jquery.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/diffview.js"></script>
<script src="<?php echo $plug_fl; ?>js/difflib.js"></script>
<script src="<?php echo $plug_fl; ?>js/diff_viewer.js"></script>
<script src="<?php echo $plug_fl; ?>js/common.js"></script>

