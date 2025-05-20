<?php
$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/jquery-ui.min.css" media="all"/>
<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/javascript_beautifier.css" media="all"/>
<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/common.css" media="all"/></head>



        
<div class="card">
        	<div class="card-body">
            	<p>Online Javascript beautifier takes ugly, minified or obfuscated javascript and make it clean, well-formatted code. It gives the code proper indentation, newlines, spaces to make it easier to read. There are many options in the options button to give the beautifier your personal beautifying tastes.</p>
                <div class="well well-sm">
                	<form class="form-inline text-left">
                    <fieldset>
                    
                    <div class="form-group buttons_div">
                      <div class="col-md-12">
                      	<ul class="nav_ul ul_buttons">
                        	<li><a id="load_url" href="#">Load&nbsp;Url</a></li>
                            <li><a id="browse" href="#">Browse</a></li>
                            <li><a id="beautify_js" href="#">Beautify&nbsp;js</a></li>
                            <li><a id="minify_js" href="#">Minify&nbsp;js</a></li>
                            <li><a id="options" href="#">Options</a></li>
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
                    <!-- Modal -->
                    <div class="modal fade" id="options_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Beautify Options</h4>
                          </div>
                          <div class="modal-body">
                          	<form class="form-horizontal" action="#" method="post">
                            <fieldset>
                            
                            <!-- Select Basic -->
                            <div class="form-group">
                              <div class="col-md-12">
                                <select id="tabsize" name="tabsize" class="form-control">
                                  <option value="1">Indent with a tab character</option>
                                  <option value="2">Indent with 2 spaces</option>
                                  <option value="3">Indent with 3 spaces</option>
                                  <option value="4">Indent with 4 spaces</option>
                                  <option value="8">Indent with 8 spaces</option>
                                </select>
                              </div>
                            </div>
                            
                            <!-- Select Basic -->
                            <div class="form-group">
                              <div class="col-md-12">
                                <select id="max-preserve-newlines" name="max-preserve-newlines" class="form-control">
                                  <option value="-1">Remove all extra newlines</option>
                                  <option value="1">Allow 1 newline between tokens</option>
                                  <option value="2">Allow 2 newlines between tokens</option>
                                  <option value="5">Allow 5 newlines between tokens</option>
                                  <option value="10">Allow 10 newlines between tokens</option>
                                  <option value="0">Allow unlimited newlines between tokens</option>
                                </select>
                              </div>
                            </div>
                            
                            <!-- Select Basic -->
                            <div class="form-group">
                              <div class="col-md-12">
                                <select id="wrap-line-length" name="wrap-line-length" class="form-control">
                                  <option value="0">Do not wrap lines</option>
                                  <option value="40">Wrap lines near 40 characters</option>
                                  <option value="70">Wrap lines near 70 characters</option>
                                  <option value="80">Wrap lines near 80 characters</option>
                                  <option value="110">Wrap lines near 110 characters</option>
                                  <option value="120">Wrap lines near 120 characters</option>
                                  <option value="160">Wrap lines near 160 characters</option>
                                </select>
                              </div>
                            </div>
                            
                            <!-- Select Basic -->
                            <div class="form-group">
                              <div class="col-md-12">
                                <select id="brace-style" name="brace-style" class="form-control">
                                  <option value="collapse">Braces with control statement</option>
                                  <option value="expand">Braces on own line</option>
                                  <option value="end-expand">End braces on own line</option>
                                  <option value="none">Attempt to keep braces where they are</option>
                                </select>
                              </div>
                            </div>
                            
                            <p><strong>HTML &lt;style&gt;, &lt;script&gt; formatting:</strong></p>
                            
                            <!-- Select Basic -->
                            <div class="form-group">
                              <div class="col-md-12">
                                <select id="indent-scripts" name="indent-scripts" class="form-control">
                                  <option value="keep">Keep indent level of the tag</option>
                                  <option value="normal">Add one indent level</option>
                                  <option value="separate">Separate indentation</option>
                                </select>
                              </div>
                            </div>
                            
                            <!-- Multiple Checkboxes -->
                            <div class="form-group">
                              <div class="col-md-12">
                              <div class="checkbox">
                                <label for="end-with-newline">
                                  <input name="checkboxes" id="end-with-newline" value="end-with-newline" type="checkbox">
                                  End script and style with newline?
                                </label>
                                </div>
                              <div class="checkbox">
                                <label for="comma-first">
                                  <input name="checkboxes" id="comma-first" value="comma-first" type="checkbox">
                                  Use comma-first list style?
                                </label>
                                </div>
                              <div class="checkbox">
                                <label for="detect-packers">
                                  <input name="checkboxes" id="detect-packers" value="detect-packers" type="checkbox">
                                  Detect packers and obfuscators?
                                </label>
                                </div>
                              <div class="checkbox">
                                <label for="keep-array-indentation">
                                  <input name="checkboxes" id="keep-array-indentation" value="keep-array-indentation" type="checkbox">
                                  Keep array indentation?
                                </label>
                                </div>
                              <div class="checkbox">
                                <label for="break-chained-methods">
                                  <input name="checkboxes" id="break-chained-methods" value="break-chained-methods" type="checkbox">
                                  Break lines on chained methods?
                                </label>
                                </div>
                              <div class="checkbox">
                                <label for="space-before-conditional">
                                  <input name="checkboxes" id="space-before-conditional" value="space-before-conditional" type="checkbox">
                                  Space before conditional: "if(x)" / "if (x)"
                                </label>
                                </div>
                              <div class="checkbox">
                                <label for="unescape-strings">
                                  <input name="checkboxes" id="unescape-strings" value="unescape-strings" type="checkbox">
                                  Unescape printable chars encoded as \xNN or \uNNNN?
                                </label>
                                </div>
                              <div class="checkbox">
                                <label for="jslint-happy">
                                  <input name="checkboxes" id="jslint-happy" value="jslint-happy" type="checkbox">
                                  Use JSLint-happy formatting tweaks?
                                </label>
                                </div>
                              <div class="checkbox">
                                <label for="indent-inner-html">
                                  <input name="checkboxes" id="indent-inner-html" value="indent-inner-html" type="checkbox">
                                  Indent &lt;head&gt; and &lt;body&gt; sections?
                                </label>
                                </div>
                              </div>
                            </div>
                            
                            </fieldset>
                        </form>
                          </div>
                          <div class="modal-footer">
                            <button data-dismiss="modal" id="set" name="set" class="btn btn-success">Set</button>
                            <button data-dismiss="modal" id="cancel" name="cancel" class="btn btn-danger">Cancel</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 div_code1">
                        	<div class="h_text">Enter javascript here:<button id="max_code1" class="btn btn-toolbar btn-sm" title="maximize" style="position:absolute;right:120px;"><span class="glyphicon glyphicon-resize-full" aria-hidden="true"></span></button><button id="sample" class="btn btn-toolbar btn-sm" title="sample data" style="position:absolute;right:85px;"><span class="glyphicon glyphicon-copy" aria-hidden="true"></span></button><button id="copy_data1" class="btn btn-toolbar btn-sm" style="position:absolute;right:50px;"><span class="glyphicon glyphicon-duplicate" aria-hidden="true"></span></button><button id="clear_code1" class="btn btn-toolbar btn-sm" title="clear" style="position:absolute;right:15px;"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></div>
                            <div id="code1"></div>
                        </div>
                        <div class="col-md-6 div_code2">
                        	<div class="h_text">Results:<button id="max_code2" class="btn btn-toolbar btn-sm" title="maximize" style="position:absolute;right:85px;"><span class="glyphicon glyphicon-resize-full" aria-hidden="true"></span></button><button id="copy_data2" class="btn btn-toolbar btn-sm" style="position:absolute;right:50px;"><span class="glyphicon glyphicon-duplicate" aria-hidden="true"></span></button><button id="clear_code2" class="btn btn-toolbar btn-sm" title="clear" style="position:absolute;right:15px;"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></div>
                        	<div id="code2"></div>
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
<script src="<?php echo $plug_fl; ?>js/js-beautify/js/lib/beautify.js"></script>
<script src="<?php echo $plug_fl; ?>js/js-beautify/js/lib/beautify-css.js"></script>
<script src="<?php echo $plug_fl; ?>js/js-beautify/js/lib/beautify-html.js"></script>
<script src="<?php echo $plug_fl; ?>js/js-beautify/js/lib/unpackers/javascriptobfuscator_unpacker.js"></script>
<script src="<?php echo $plug_fl; ?>js/js-beautify/js/lib/unpackers/urlencode_unpacker.js"></script>
<script src="<?php echo $plug_fl; ?>js/js-beautify/js/lib/unpackers/p_a_c_k_e_r_unpacker.js"></script>
<script src="<?php echo $plug_fl; ?>js/js-beautify/js/lib/unpackers/myobfuscate_unpacker.js"></script>
<script src="<?php echo $plug_fl; ?>js/UglifyJS2/lib/utils.js"></script>
<script src="<?php echo $plug_fl; ?>js/UglifyJS2/lib/ast.js"></script>
<script src="<?php echo $plug_fl; ?>js/UglifyJS2/lib/parse.js"></script>
<script src="<?php echo $plug_fl; ?>js/UglifyJS2/lib/transform.js"></script>
<script src="<?php echo $plug_fl; ?>js/UglifyJS2/lib/scope.js"></script>
<script src="<?php echo $plug_fl; ?>js/UglifyJS2/lib/output.js"></script>
<script src="<?php echo $plug_fl; ?>js/UglifyJS2/lib/compress.js"></script>
<script src="<?php echo $plug_fl; ?>js/javascript_beautifier.js"></script>
<script src="<?php echo $plug_fl; ?>js/common.js"></script>

