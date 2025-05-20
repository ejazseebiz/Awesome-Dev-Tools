<?php
$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/web_hosting_bandwidth_calculator.css" media="all"/>
<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/common.css" media="all"/></head>

        
<div class="card">
        	<div class="card-body">
            	<p>Web Hosting Bandwidth Calculator calculates estimated monthly bandwidth usage of your websites. Enter Average page size, Average daily visitor and Average pages per visit to get an idea of what web hosting plan you should be using in terms of bandwidth usage of your websites.</p>
                <div class="well well-sm">
                	<p class="info text-danger"></p>
                	<form class="text-left">
                        <fieldset>
                        
                        <div class="form-group">
                        	<label for="avg_page_size">Average page size (MB)</label>
                        	<input id="avg_page_size" name="avg_page_size" type="text" placeholder="" class="form-control input-md">
                        </div>
                        
                        <div class="form-group">
                        	<label for="avg_daily_visitor">Average daily visitor</label>
                        	<input id="avg_daily_visitor" name="avg_daily_visitor" type="text" placeholder="" class="form-control input-md">
                        </div>
                        
                        <div class="form-group">
                        	<label for="avg_pages_per_visit">Average pages per visit</label>
                        	<input id="avg_pages_per_visit" name="avg_pages_per_visit" type="text" placeholder="" class="form-control input-md">
                        </div>
                        
                        <!-- Button (Double) -->
                        <div class="form-group">
                          <div class="col-md-12">
                            <button id="calculate" name="calculate" class="btn btn-success">Calculate</button>
                            <button id="clear" name="clear" class="btn btn-danger">Clear</button>
                          </div>
                        </div>
                        
                        </fieldset>
                	</form>
                </div>
                <div class="well well-sm out" style="display:none;"><p class="data_out"></p></div>
            </div>
        </div>
       
        


<script src="<?php echo $plug_fl; ?>js/jquery.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/web_hosting_bandwidth_calculator.js"></script>
<script src="<?php echo $plug_fl; ?>js/common.js"></script>


