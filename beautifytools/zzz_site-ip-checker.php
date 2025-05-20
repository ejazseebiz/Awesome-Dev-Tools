


 <link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/site_ip_checker.css" media="all"/>
<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/common.css" media="all"/></head>

        
        <div class="row">
        	<div class="col-md-12">
            	<p>Check IP of a domain, website or url. Our Site IP Checker list all IPs that belong to a domain. Site IP Checker checks IP or IPs that belong to a domain, website or url. Enter a domain, website or url and check its IP.</p>
                <div class="well well-sm">
                	<p class="info text-danger"></p>
                	<form class="form-horizontal" action="#" method="post">
                        <fieldset>
                        
                        <!-- Textarea -->
                        <div class="form-group">
                          <div class="col-md-12">                     
                            <input id="url" name="url" placeholder="www.example.com" class="form-control" type="text">
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
                <table class="table table-hover text-left ip_tb" style="display:none;">
                	<thead>
                        <tr>
                            <th>Domain</th>
                            <th>Ip</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    
        
    

<script src="<?php echo $plug_fl; ?>js/jquery.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/site_ip_checker.js"></script>
<script src="<?php echo $plug_fl; ?>js/common.js"></script>


