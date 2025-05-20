<?php
$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/jquery-ui.min.css" media="all"/>
<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/excel_to_html_converter.css" media="all"/>
<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/common.css" media="all"/></head>




<div class="card">
        	<div class="card-body">
        <div class="row">
        	<div class="col-md-12">
            	<p>Convert excel to Html using Excel To Html Converter. Click browse for an excel file and convert its data to Html.</p>
                <div class="well well-sm">
                	<form class="form-inline text-left">
                    <fieldset>
                    
                    <div class="form-group buttons_div">
                      <div class="col-md-12">
                      	<ul class="nav_ul ul_buttons">
                        	<li><a id="browse" href="#">Browse</a></li>
                            <li><a id="convert" href="#">Convert</a></li>
                            <li><a id="preview" href="#">Preview</a></li>
                            <li><a id="beautify_html" href="#">Beautify&nbsp;Html</a></li>
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
                    <!-- Modal -->
                    <div class="modal fade" id="msg_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Message</h4>
                          </div>
                          <div class="modal-body">
                          	<p class="text-center" id="msg"></p>
                          </div>
                          <div class="modal-footer">
                          	<button data-dismiss="modal" id="ok_msg" name="ok_msg" class="btn btn-success">Ok</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="editor_options_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Editor Options</h4>
                          </div>
                          <div class="modal-body">
                          	<form class="form-horizontal">
                            <fieldset>
                            
                            <!-- Select Basic -->
                            <div class="form-group">
                              <label class="col-md-2 control-label" for="themes">Themes</label>
                              <div class="col-md-10">
                                <select id="themes" name="themes" class="form-control">
                                </select>
                              </div>
                            </div>
                            
                            <!-- Select Basic -->
                            <div class="form-group">
                              <label class="col-md-2 control-label" for="font_size">Font Size</label>
                              <div class="col-md-10">
                                <select id="font_size" name="font_size" class="form-control">
                                	<option value="6">6px</option>
                                    <option value="7">7px</option>
                                    <option value="8">8px</option>
                                    <option value="9">9px</option>
                                    <option value="10">10px</option>
                                    <option value="11">11px</option>
                                    <option value="12">12px</option>
                                    <option value="13">13px</option>
                                    <option value="14">14px</option>
                                    <option value="15">15px</option>
                                    <option value="16">16px</option>
                                    <option value="17">17px</option>
                                    <option value="18">18px</option>
                                    <option value="19">19px</option>
                                    <option value="20">20px</option>
                                    <option value="21">21px</option>
                                    <option value="22">22px</option>
                                    <option value="23">23px</option>
                                    <option value="24">24px</option>
                                    <option value="25">25px</option>
                                    <option value="26">26px</option>
                                    <option value="27">27px</option>
                                    <option value="28">28px</option>
                                    <option value="29">29px</option>
                                    <option value="30">30px</option>
                                    <option value="31">31px</option>
                                    <option value="32">32px</option>
                                    <option value="33">33px</option>
                                    <option value="34">34px</option>
                                    <option value="35">35px</option>
                                    <option value="36">36px</option>
                                </select>
                              </div>
                            </div>
                            
                            </fieldset>
                            </form>
                          </div>
                          <div class="modal-footer">
                            <button data-dismiss="modal" id="ok" name="ok" class="btn btn-success">Ok</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div id="code1"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-12">
            	<div class="well well-sm data_tb text-left" style="overflow:auto;display:none;">
                	
            	</div>
            </div>
        </div>
  
</div>
</div>

<script src="<?php echo $plug_fl; ?>js/jquery.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/jquery-ui.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/bootstrap.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/FileSaver.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/ace/src-min-noconflict/ace.js"></script>
<script src="<?php echo $plug_fl; ?>js/ace/src-min-noconflict/ext-language_tools.js"></script>
<script src="<?php echo $plug_fl; ?>js/ace/src-min-noconflict/ext-themelist.js"></script>
<script src="<?php echo $plug_fl; ?>js/js-beautify/js/lib/beautify-css.js"></script>
<script src="<?php echo $plug_fl; ?>js/js-beautify/js/lib/beautify-html.js"></script>
<script src="<?php echo $plug_fl; ?>js/js-xlsx/xlsx.core.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/js-xlsx/cpexcel.js"></script>
<script src="<?php echo $plug_fl; ?>js/js-xlsx/ods.js"></script>
<script src="<?php echo $plug_fl; ?>js/excel_to_html_converter.js"></script>
<script src="<?php echo $plug_fl; ?>js/common.js"></script>

