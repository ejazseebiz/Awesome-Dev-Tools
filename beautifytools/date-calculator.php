<?php
$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/date_calculator.css" media="all"/>
<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/common.css" media="all"/></head>

<div class="card">
        	<div class="card-body">
        
        <div class="row">
        	<div class="col-md-12">
            	<p>The Date Calculator calculates the time difference between 2 dates. It also calculates the duration in different units like Years, Months, Days, Weeks, Hours, Minutes and Seconds. Enter the start, end dates and click Calculate to get the time difference.</p>
                <div class="well well-sm">
                	<form class="form-horizontal" action="#" method="post">
                        <fieldset class="row">
                        
                        <!-- Text input-->
                        <div class="form-group col-md-6">
                          <label class="col-md-3 control-label" for="sday">Start Date</label>  
                          <div class="col-md-3">
                          <input id="sday" name="sday" type="text" placeholder="DD" class="form-control input-md text-center">
                            
                          </div>
                          <div class="col-md-3">
                          <input id="smonth" name="smonth" type="text" placeholder="MM" class="form-control input-md text-center">
                            
                          </div>
                          <div class="col-md-3">
                          <input id="syear" name="syear" type="text" placeholder="YYYY" class="form-control input-md text-center">
                            
                          </div>
                        </div>
						
                        <!-- Text input-->
                        <div class="form-group col-md-6">
                          <label class="col-md-3 control-label" for="eday">End Date</label>
                          <div class="col-md-3">
                          <input id="eday" name="eday" type="text" placeholder="DD" class="form-control input-md text-center">
                            
                          </div>
                          <div class="col-md-3">
                          <input id="emonth" name="emonth" type="text" placeholder="MM" class="form-control input-md text-center">
                            
                          </div>
                          <div class="col-md-3">
                          <input id="eyear" name="eyear" type="text" placeholder="YYYY" class="form-control input-md text-center">
                            
                          </div>
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
            </div>
        </div>
        <div class="row">
        	<div class="col-md-12">
                <div class="well well-sm data_out" style="display:none;">
                	<div class="row">
        				<div class="col-md-12">
                        	<h2 style="margin:0px;">Your result</h2><p style="color:#FFF;background-color:#000;margin:10px 0px;padding:5px;font-size:18px;" class="img-rounded date_str"></p>
                        </div>
                    </div>
                    <div class="row">
        				<div class="col-md-7">
                        	<p><strong>From Date : </strong><span class="fdate"></span></p><p><strong>To Date, But not Include : </strong><span class="tdate"></span></p>
                        </div>
                        <div class="col-md-5">
                        	<h3 style="margin:0px;">Alternative time units:</h3>
                            <ul style="list-style:circle;">
                            	<li><span class="tyears"></span> <strong>Years</strong></li>
                                <li><span class="tmonths"></span> <strong>Months</strong></li>
                                <li><span class="tdays"></span> <strong>Days</strong></li>
                                <li><span class="tweeks"></span> <strong>Weeks(Approx)</strong></li>
                                <li><span class="thours"></span> <strong>Hours</strong></li>
                                <li><span class="tminutes"></span> <strong>Minutes</strong></li>
                                <li><span class="tseconds"></span> <strong>Seconds</strong></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
        				<div class="col-md-12">
                        	<p style="display:none;color:#FFF;background-color:#CA0000;margin:10px 0px;padding:5px;font-size:16px;" class="img-rounded date_war">Important : The Start date was after the End date, so the Start and End fields were SWAPPED.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         
</div>
</div>

<script src="<?php echo $plug_fl; ?>js/jquery.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/date_calculator.js"></script>
<script src="<?php echo $plug_fl; ?>js/common.js"></script>

