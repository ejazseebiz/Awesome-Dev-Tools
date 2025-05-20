<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/javascript_obfuscator.css" media="all"/>
<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/common.css" media="all"/></head>
        <div class="row">
        	<div class="col-md-12">
            	<p>Obfuscate javascript code using Online Javascript Obfuscator to make your javascript code nearly impossible to read or understand. Online Javascript Obfuscator makes javascript code harder to read or understand to protect from theft or reuse. It uses some algorithms and changes your code in a certain way so that it becomes nearly impossible to copy your code. The obfuscated javascript code works like normal code and it can be converted back to normal code at any time.</p>
                <div class="well well-sm">
                	<p class="info text-danger"></p>
                	<form id="obfuscator_form" class="form-horizontal" action="#" method="post">
                        <fieldset>
                        
                        <!-- Textarea -->
                        <div class="form-group">
                          <div class="col-md-12">                     
                            <textarea style="height:250px;" class="form-control" id="src" name="src" placeholder="Enter your code here ..."></textarea>
                          </div>
                        </div>
                        
                        <!-- Select Basic -->
                        <div class="form-group">
                          <div class="col-md-12">
                            <select id="ascii_encoding" name="ascii_encoding" class="form-control">
                              <option value="" >Select Encoding</option>
                              <option value="0" >None</option>
                              <option value="10" >Numeric</option>
                              <option value="62" selected>Normal</option>
                              <option value="95" >High ASCII</option>
                            </select>
                          </div>
                        </div>
                        
                        <!-- Multiple Checkboxes -->
                        <div class="form-group text-left">
                          <div class="col-md-12">
                          <div class="checkbox">
                            <label for="fast-decode">
                              <input type="checkbox" name="fast_decode" id="fast-decode" value="fast-decode" checked>
                              Fast Decode
                            </label>
                            </div>
                          <div class="checkbox">
                            <label for="special-char">
                              <input type="checkbox" name="special_char" id="special-char" value="special-char" >
                              Special Characters
                            </label>
                            </div>
                          </div>
                        </div>
                        
                        <!-- Button (Double) -->
                        <div class="form-group">
                          <div class="col-md-12">
                            <button id="obfuscate" name="obfuscate" class="btn btn-success">Obfuscate</button>
                            <button id="clear" name="clear" class="btn btn-danger">Clear</button>
                          </div>
                        </div>
                        
                        </fieldset>
                	</form>
                </div>
                            </div>
        </div>
        

            
<script src="<?php echo $plug_fl; ?>js/jquery.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/javascript_obfuscator.js"></script>
<script src="<?php echo $plug_fl; ?>js/common.js"></script>