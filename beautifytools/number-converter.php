<?php
$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/number_converter.css" media="all"/>
<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/common.css" media="all"/></head>

<div class="card">
        	<div class="card-body">
        <div class="row">
        	<div class="col-md-6">
            	<div class="well well-sm">
                	<div class="info text-danger"></div>
                	<form class="form-horizontal" action="#" method="post">
                        <fieldset>
                        <!-- Textarea -->
                        <div class="form-group">
                          <div class="col-md-12">                     
                            <textarea placeholder="Enter Binary / Decimal / Hexadecimal / Ascii data here" style="height:250px;" class="form-control" id="from" name="from"></textarea>
                          </div>
                        </div>
                        </fieldset>
                	</form>
                </div>
            </div>
            <div class="col-md-6">
            	<div class="well well-sm">
                	<form class="form-horizontal" action="#" method="post">
                        <fieldset>
                        
                        <!-- Textarea -->
                        <div class="form-group">
                          <div class="col-md-12">                     
                            <textarea placeholder="Your result will be shown here" style="height:250px;" class="form-control" id="to" name="to"></textarea>
                          </div>
                        </div>
                        
                        </fieldset>
                	</form>
                </div>
            </div>
            <div class="col-md-12">
              <div class="well well-sm">
                  <!-- Select Basic -->
                  <div class="form-group">
                          <div class="col-md-12">
                            <select id="format" name="format" class="form-control">
                              <option value="bin2dec">Binary to Decimal</option>
                              <option value="dec2hex">Decimal to Hexadecimal</option>
                              <option value="hex2bin">Hexadecimal to Binary</option>
                              <option value="dec2bin">Decimal to Binary</option>
                              <option value="asc2bin">Ascii to Binary</option>
                              <option value="bin2asc">Binary to Ascii</option>
                            </select>
                          </div>
                        </div>
                        
                        <!-- Button (Double) -->
                        <div class="form-group">
                          <div class="col-md-12">
                            <button id="convert" name="convert" class="btn btn-success">Convert</button>
                            <button id="clear" name="clear" class="btn btn-danger">Clear</button>
                          </div>
                        </div>
              </div>
            </div>
        </div>
</div>
</div>
        

<script src="<?php echo $plug_fl; ?>js/jquery.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/number_converter.js"></script>
<script src="<?php echo $plug_fl; ?>js/common.js"></script>


