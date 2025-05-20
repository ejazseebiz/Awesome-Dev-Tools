<?php
$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );
?>

 <link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/jquery-ui.min.css" media="all"/>
<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/add_nofollow_to_link.css" media="all"/>
<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/common.css" media="all"/>

        
<div class="card">
        	<div class="card-body">
            	<p>Add a <code>rel="nofollow"</code> to all links that found in your html code.</p>
                <div class="well well-sm">
                	<form class="form-inline text-left">
                    <fieldset>
                    
                    <div class="form-group buttons_div">
                      <div class="col-md-12">
                      	<ul class="nav_ul ul_buttons">
                        	<li><a id="load_url" href="#">Load&nbsp;Url</a></li>
                            <li><a id="browse" href="#">Browse</a></li>
                            <li><a id="add_nofollow" href="#">Add&nbsp;Nofollow</a></li>
                            <li><a id="beautify_html" href="#">Beautify&nbsp;html</a></li>
                            <li><a id="editor_options" data-toggle="modal" data-target="#editor_options_modal" data-backdrop="false" href="#">Editor&nbsp;Options</a></li>
                            <li><a id="download" href="#">Download</a></li>
                            <li><a id="clear" href="#">Clear</a></li>
                        </ul>
                      </div>
                    </div>
                    <input style="display:none;" id="file" name="file" class="btn btn-default" type="file">
                    
                    </fieldset>
                    </form>
                    <!-- Modal -->
                    <div class="modal fade" id="url_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Enter Url</h4>
                          </div>
                          <div class="modal-body">
                          	<input id="url" name="url" type="text" placeholder="Enter full url" class="form-control input-md">
                          </div>
                          <div class="modal-footer">
                          	<button data-dismiss="modal" id="load" name="load" class="btn btn-success">Load</button>
                            <button data-dismiss="modal" id="cancel" name="cancel" class="btn btn-danger">Cancel</button>
                          </div>
                        </div>
                      </div>
                    </div>

                    
                    
                </div>
            </div>
        </div>
            </div>
   

<script src="<?php echo $plug_fl; ?>js/jquery.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/jquery-ui.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/bootstrap.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/FileSaver.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/zclip/jquery.zclip.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/ace/src-min-noconflict/ace.js"></script>
<script src="<?php echo $plug_fl; ?>js/ace/src-min-noconflict/ext-language_tools.js"></script>
<script src="<?php echo $plug_fl; ?>js/ace/src-min-noconflict/ext-themelist.js"></script>
<script src="<?php echo $plug_fl; ?>js/js-beautify/js/lib/beautify-html.js"></script>
<script src="<?php echo $plug_fl; ?>js/add_nofollow_to_link.js"></script>
<script src="<?php echo $plug_fl; ?>js/common.js"></script>

