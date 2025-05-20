<?php
$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/css_validator.css" media="all"/>
<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/common.css" media="all"/></head>
<div class="card">
        	<div class="card-body">

        <div class="row">
        	<div class="col-md-12">
				<p>Use Online CSS Validator to validate css code and find errors and warnings that can be fixed. Personalize your css validation from the options. See errors and warnings of your code as you type. Beautify / format your css code after coding is complete.</p>
            	<div class="well well-sm">
                	<div id="code1"></div>
                	<form class="form-horizontal" action="#" method="post">
                        <fieldset>
                        
                        <!-- Button (Double) -->
                        <div class="form-group text-center" style="margin-top:10px;">
                          <div class="col-md-12">
                          	<button id="validate_code" name="validate_code" class="btn btn-info">Validate&nbsp;Code</button>
                            <button id="format_code" name="format_code" class="btn btn-success">Format&nbsp;Code</button>
                            <button id="options" name="options" class="btn btn-primary">Options</button>
                            <button id="clear" name="clear" class="btn btn-danger">Clear</button>
                          </div>
                        </div>
                        
                        </fieldset>
                	</form>
                </div>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-12">
            	<div class="well well-sm data_options" style="display:none;">
                	<div class="row">
                    	<div class="col-md-4">
                        	<h3>Errors</h3>
                              <ul class="optionsList">
                                  <li><label><input type="checkbox" name="box-model" checked>&nbsp;Beware of broken box sizing</label></li>
                                  <li><label><input type="checkbox" name="display-property-grouping" checked>&nbsp;Require properties appropriate for <code>display</code></label></li>
                                  <li><label><input type="checkbox" name="duplicate-properties" checked>&nbsp;Disallow duplicate properties</label></li>
                                  <li><label><input type="checkbox" name="empty-rules" checked>&nbsp;Disallow empty rules</label></li>
                                  <li><label><input type="checkbox" name="known-properties" checked>&nbsp;Require use of known properties</label></li>
                              </ul>
                        </div>
                        <div class="col-md-4">
                        	<h3>Compatibility</h3>
                              <ul class="optionsList">
                                  <li><label><input type="checkbox" name="adjoining-classes" checked>&nbsp;Disallow adjoining classes</label></li>
                                  <li><label><input type="checkbox" name="box-sizing" checked>&nbsp;Disallow <code>box-sizing</code></label></li>
                                  <li><label><input type="checkbox" name="compatible-vendor-prefixes" checked>&nbsp;Require compatible vendor prefixes</label></li>
                                  <li><label><input type="checkbox" name="gradients" checked>&nbsp;Require all gradient definitions</label></li>
                                  <li><label><input type="checkbox" name="text-indent" checked>&nbsp;Disallow negative <code>text-indent</code></label></li>
                                  <li><label><input type="checkbox" name="vendor-prefix" checked>&nbsp;Require standard property with vendor prefix</label></li>
                                  <li><label><input type="checkbox" name="fallback-colors" checked>&nbsp;Require fallback colors</label></li>
                                  <li><label><input type="checkbox" name="star-property-hack" checked>&nbsp;Disallow star hack</label></li>
                                  <li><label><input type="checkbox" name="underscore-property-hack" checked>&nbsp;Disallow underscore hack</label> </li>
                                  <li><label><input type="checkbox" name="bulletproof-font-face" checked>&nbsp;Bullet-proof @font-face</label></li>
                              </ul>
                        </div>
                        <div class="col-md-4">
                        	<h3>Performance</h3>
                              <ul class="optionsList">
                                  <li><label><input type="checkbox" name="font-faces" checked>&nbsp;Don't use too many web fonts</label></li>
                                  <li><label><input type="checkbox" name="import" checked>&nbsp;Disallow <code>@import</code></label></li>
                                  <li><label><input type="checkbox" name="duplicate-background-images" checked>&nbsp;Disallow duplicate background images</label></li>
                                  <li><label><input type="checkbox" name="regex-selectors" checked>&nbsp;Disallow selectors that look like regexs</label></li>
                                  <li><label><input type="checkbox" name="universal-selector" checked>&nbsp;Disallow universal selector</label></li>
                                  <li><label><input type="checkbox" name="unqualified-attributes" checked>&nbsp;Disallow unqualified attribute selectors</label></li>
                                  <li><label><input type="checkbox" name="zero-units" checked>&nbsp;Disallow units for 0 values</label></li>
                                  <li><label><input type="checkbox" name="overqualified-elements" checked>&nbsp;Disallow overqualified elements</label></li>
                                  <li><label><input type="checkbox" name="shorthand" checked>&nbsp;Require shorthand properties</label></li>
                              </ul>
                        </div>
                    </div>
                    <div class="row">
                    	<div class="col-md-4">
                        	<h3>Maintainability & Duplication</h3>
                              <ul class="optionsList">
                                  <li><label><input type="checkbox" name="floats" checked>&nbsp;Disallow too many floats</label></li>
                                  <li><label><input type="checkbox" name="font-sizes" checked>&nbsp;Don't use too many font sizes</label></li>
                                  <li><label><input type="checkbox" name="ids">&nbsp;Disallow IDs in selectors</label></li>
                                  <li><label><input type="checkbox" name="important" checked>&nbsp;Disallow <code>!important</code></label></li>
                              </ul>
                        </div>
                        <div class="col-md-4">
                        	<h3>Accessibility</h3>
                              <ul class="optionsList">
                                  <li><label><input type="checkbox" name="outline-none">&nbsp;Disallow <code>outline:none</code></label></li>
                              </ul>
                        </div>
                        <div class="col-md-4">
                        	<h3>OOCSS</h3>
                              <ul class="optionsList">
                                  <li><label><input type="checkbox" name="qualified-headings" checked>&nbsp;Disallow qualified headings</label></li>
                                  <li><label><input type="checkbox" name="unique-headings" checked>&nbsp;Heading should only be defined once</label></li>
                              </ul>
                        </div>
                    </div>
                    <div class="row">
                    	<div class="col-md-12">
                        	<p><a target="_blank" rel="nofollow" href="https://github.com/stubbornella/csslint/wiki/Rules">Learn More About the Rules</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-12">
            	<div class="well well-sm data_well">
                    <table class="table data table-striped table-hover" style="width:100%;background-color:#FFF;">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th>Line</th>
                                <th>Col</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Browser</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<tr>
                            	<td colspan="6">No syntax errors!</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

</div>
</div>
<script src="<?php echo $plug_fl; ?>js/jquery.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/ace/src-min-noconflict/ace.js"></script>
<script src="<?php echo $plug_fl; ?>js/ace/src-min-noconflict/ext-language_tools.js"></script>
<script src="<?php echo $plug_fl; ?>js/js-beautify/js/lib/beautify.js"></script>
<script src="<?php echo $plug_fl; ?>js/js-beautify/js/lib/beautify-css.js"></script>
<script src="<?php echo $plug_fl; ?>js/js-beautify/js/lib/beautify-html.js"></script>
<script src="<?php echo $plug_fl; ?>js/csslint.js"></script>
<script src="<?php echo $plug_fl; ?>js/css_validator.js"></script>
<script src="<?php echo $plug_fl; ?>js/common.js"></script>

