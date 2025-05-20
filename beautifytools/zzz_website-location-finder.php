

 <link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/website_location_finder.css" media="all"/>
<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/common.css" media="all"/></head>

        
        <div class="row">
        	<div class="col-md-12">
            	<p>Find the current location of a website or IP on a map. Website Location Finder also shows other related information about the website or IP address like Status, Country, Latitude, Longitude, Currency code etc. Find the current location along with other information of a website or IP using Website Location Finder. It also shows a map indicating geolocation of the website or IP address.</p>
                <div class="well well-sm">
                	<p class="info text-danger"></p>
                	<form id="location_finder" class="form-horizontal" action="#" method="post">
                        <fieldset>
                        
                        <!-- Textarea -->
                        <div class="form-group">
                          <div class="col-md-12">                     
                            <input id="url" name="url" placeholder="Enter a domain or an IP address" class="form-control" type="text" value="">
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
                            </div>
        </div>
           

<script src="<?php echo $plug_fl; ?>js/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script src="<?php echo $plug_fl; ?>js/website_location_finder.js"></script>

<script src="<?php echo $plug_fl; ?>js/common.js"></script>


