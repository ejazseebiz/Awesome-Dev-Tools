

 <link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/site_speed_checker.css" media="all"/>
<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/common.css" media="all"/></head>

        
        <div class="row">
        	<div class="col-md-12">
            	<p>Check the loading time of a site. Site Speed Checker shows Speed, loading time and File size of a web page. Use Site Speed Checker to analyze Speed, loading time and File size of a web page. Enter a page url to see its loading time.</p>
                <div class="well well-sm">
                	<p class="info text-danger"></p>
                	<form class="form-horizontal" action="#" method="post">
                        <fieldset>
                        
                        <!-- Textarea -->
                        <div class="form-group">
                          <div class="col-md-12">                     
                            <input id="url" name="url" placeholder="Enter url" class="form-control" type="text">
                          </div>
                        </div>
                        
                        <!-- Button (Double) -->
                        <div class="form-group">
                          <div class="col-md-12">
                            <button id="check" name="check" class="btn btn-success">Check</button>
                            <button id="clear" name="clear" class="btn btn-danger">Clear</button>
                          </div>
                        </div>
                        
                        </fieldset>
                	</form>
                </div>
                <img style="display:none;margin-bottom:20px;" src="img/loader.gif" alt="loader"/>
                <div style="overflow-x:auto;display:none;margin-bottom:20px;" class="data_tb">
                    <table class="table table-hover text-left" style="margin-bottom:0px;">
                        <thead>
                            <tr>
                                <th>Url</th>
                                <th>File size (kb)</th>
                                <th>Load time (sec)</th>
                                <th>Speed (kb/sec)</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
      
        

<script src="<?php echo $plug_fl; ?>js/jquery.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/site_speed_checker.js"></script>
<script src="<?php echo $plug_fl; ?>js/common.js"></script>


