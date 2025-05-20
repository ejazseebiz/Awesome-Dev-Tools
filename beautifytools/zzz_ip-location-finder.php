

 <link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/ip_location_finder.css" media="all"/>

<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/common.css" media="all"/></head>



        
        <div class="row">
        	<div class="col-md-12">
            	<p>Find the current location of an IP address on a map. IP Location Finder also shows other related information about the IP address like Status, Country, Latitude, Longitude etc. Find the current location of an IP address along with other related information about the IP address like Status, Country, Latitude, Longitude etc. IP Location Finder also shows a map indicating geolocation of the IP address.</p>
                <div class="well well-sm">
                	<p class="info text-danger"></p>
                	<form id="location_finder" class="form-horizontal" action="#" method="post">
                        <fieldset>
                        
                        <!-- Textarea -->
                        <div class="form-group">
                          <div class="col-md-12">                     
                            <input id="url" name="url" placeholder="Enter an IP address" class="form-control" type="text" value="39.42.58.54">
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
                <table class="table table-hover table-bordered table-striped table-condensed text-left">
                    <tbody><tr><td class="properties">Location</td><td class="site_data">Lahore, Punjab, Pakistan</td></tr><tr><td class="properties">Status</td><td class="site_data">200</td></tr><tr><td class="properties">Region</td><td class="site_data">Punjab (Punjab)</td></tr><tr><td class="properties">Country</td><td class="site_data"><img src="img/flags/pk.png"/> Pakistan (PK)</td></tr><tr><td class="properties">Latitude</td><td class="site_data">31.4888</td></tr><tr><td class="properties">Longitude</td><td class="site_data">74.3686</td></tr><tr><td class="properties">Currency code</td><td class="site_data">PKR</td></tr><tr><td class="properties">Time zone</td><td class="site_data">Asia/Karachi, GMT+05:00</td></tr><tr><td class="properties">Local time</td><td class="site_data">01:22:23 (PKT) / Thu Feb 04 2021</td></tr><tr><td class="properties">Currency rate</td><td class="site_data">1.00 USD = 160.2632 PKR</td></tr></tbody>
				        </table>
				        <div class="well well-sm">
                  <div style="width:100%;height:400px;" id="map"></div>
                </div>            
          </div>
        </div>

    

<script src="<?php echo $plug_fl; ?>js/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script src="<?php echo $plug_fl; ?>js/ip_location_finder.js"></script>
<script>
function initialize() {
    var mapCanvas = document.getElementById("map");
	var position = new google.maps.LatLng(31.4888, 74.3686);
    var mapOptions = {
        center: position,
        zoom: 5,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    var map = new google.maps.Map(mapCanvas, mapOptions);
	var marker = new google.maps.Marker({
        map: map,
        position: position,
        title: "39.42.58.54"
    });
}
google.maps.event.addDomListener(window, "load", initialize);</script>
<script src="<?php echo $plug_fl; ?>js/common.js"></script>


