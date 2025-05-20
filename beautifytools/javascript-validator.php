<?php
$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/javascript_validator.css" media="all"/>
<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/common.css" media="all"/></head>



<div class="card">
        	<div class="card-body">
        <div class="row">
        	<div class="col-md-12">
            	<div class="well well-sm">
                	<div id="code1"></div>
                	<form class="form-horizontal" action="#" method="post">
                        <fieldset>
                        
                        <!-- Button (Double) -->
                        <div class="form-group text-center" style="margin-top:10px;">
                          <div class="col-md-12">
                          	<button id="validate_code" name="validate_code" class="btn btn-info">Validate&nbsp;Code</button>
                            <button id="options" name="options" class="btn btn-primary">Options</button>
                            <button id="format_code" name="format_code" class="btn btn-success">Format&nbsp;Code</button>
                            <button id="clear" name="clear" class="btn btn-danger">Clear</button>
                          </div>
                        </div>
                        
                        </fieldset>
                	</form>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="options_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Options</h4>
                  </div>
                  <div class="modal-body">
                  <form>
                  <fieldset>
                    <div class="checkbox">
                        <label for="browser">
                            <input name="checkboxes" id="browser" value="browser" type="checkbox" checked>Define globals exposed by modern browsers.
                        </label>
                    </div>
                    <div class="checkbox">
                        <label for="browserify">
                            <input name="checkboxes" id="browserify" value="browserify" type="checkbox">Add Browserify library.
                        </label>
                    </div>
                    <div class="checkbox">
                        <label for="couch">
                            <input name="checkboxes" id="couch" value="couch" type="checkbox">Add CouchDB library.
                        </label>
                    </div>
                    <div class="checkbox">
                        <label for="dojo">
                            <input name="checkboxes" id="dojo" value="dojo" type="checkbox">Add Dojo library.
                        </label>
                    </div>
                    <div class="checkbox">
                        <label for="jasmine">
                            <input name="checkboxes" id="jasmine" value="jasmine" type="checkbox">Add Jasmine unit testing framework.
                        </label>
                    </div>
                    <div class="checkbox">
                        <label for="jquery">
                            <input name="checkboxes" id="jquery" value="jquery" type="checkbox" checked>Add jQuery library.
                        </label>
                    </div>
                    <div class="checkbox">
                        <label for="mocha">
                            <input name="checkboxes" id="mocha" value="mocha" type="checkbox">Add Mocha unit testing framework.
                        </label>
                    </div>
                    <div class="checkbox">
                        <label for="module">
                            <input name="checkboxes" id="module" value="module" type="checkbox">Add ECMAScript 6 module.
                        </label>
                    </div>
                    <div class="checkbox">
                        <label for="mootools">
                            <input name="checkboxes" id="mootools" value="mootools" type="checkbox">Add MooTools library.
                        </label>
                    </div>
                    <div class="checkbox">
                        <label for="node">
                            <input name="checkboxes" id="node" value="node" type="checkbox">Add Node.js library.
                        </label>
                    </div>
                    <div class="checkbox">
                        <label for="nonstandard">
                            <input name="checkboxes" id="nonstandard" value="nonstandard" type="checkbox">Define non-standard but widely adopted globals such as <code>escape</code> and <code>unescape</code>.
                        </label>
                    </div>
                    <div class="checkbox">
                        <label for="phantom">
                            <input name="checkboxes" id="phantom" value="phantom" type="checkbox">Add PhantomJS library.
                        </label>
                    </div>
                    <div class="checkbox">
                        <label for="prototypejs">
                            <input name="checkboxes" id="prototypejs" value="prototypejs" type="checkbox">Add Prototype JavaScript Framework.
                        </label>
                    </div>
                    <div class="checkbox">
                        <label for="qunit">
                            <input name="checkboxes" id="qunit" value="qunit" type="checkbox">Add QUnit unit testing framework.
                        </label>
                    </div>
                    <div class="checkbox">
                        <label for="rhino">
                            <input name="checkboxes" id="rhino" value="rhino" type="checkbox">Add Rhino runtime environment.
                        </label>
                    </div>
                    <div class="checkbox">
                        <label for="shelljs">
                            <input name="checkboxes" id="shelljs" value="shelljs" type="checkbox">Add ShellJS library.
                        </label>
                    </div>
                    <div class="checkbox">
                        <label for="typed">
                            <input name="checkboxes" id="typed" value="typed" type="checkbox">Define globals for JavaScript typed array constructors.
                        </label>
                    </div>
                    <div class="checkbox">
                        <label for="worker">
                            <input name="checkboxes" id="worker" value="worker" type="checkbox">Define globals for Web Workers.
                        </label>
                    </div>
                    <div class="checkbox">
                        <label for="wsh">
                            <input name="checkboxes" id="wsh" value="wsh" type="checkbox">Define globals for Windows Script Host.
                        </label>
                    </div>
                    <div class="checkbox">
                        <label for="yui">
                            <input name="checkboxes" id="yui" value="yui" type="checkbox">Add YUI library.
                        </label>
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
            <div class="col-md-12">
            	<div class="well well-sm data_well">
                    <table class="table data table-striped table-hover" style="width:100%;background-color:#FFF;">
                        <thead>
                            <tr>
                                <th>Line</th>
                                <th>Col</th>
                                <th>Errors</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<tr>
                            	<td colspan="3">No syntax errors!</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

</div>
</div>

<script src="<?php echo $plug_fl; ?>js/jquery.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/bootstrap.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/ace/src-min-noconflict/ace.js"></script>
<script src="<?php echo $plug_fl; ?>js/ace/src-min-noconflict/ext-language_tools.js"></script>
<script src="<?php echo $plug_fl; ?>js/js-beautify/js/lib/beautify.js"></script>
<script src="<?php echo $plug_fl; ?>js/jshint.js"></script>
<script src="<?php echo $plug_fl; ?>js/javascript_validator.js"></script>
<script src="<?php echo $plug_fl; ?>js/common.js"></script>

