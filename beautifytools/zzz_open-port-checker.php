


 <link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/open_port_checker.css" media="all"/>
<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/common.css" media="all"/></head>

        
        <div class="row">
        	<div class="col-md-12">
            	<p>Open Port Checker is an online tool to check if a port is online or not. It supports multiple ports checking at a time. Use Open Port Checker to check if a port is online or not. Enter a hostname or an IP address and comma separated ports to check those ports status.</p>
                <div class="well well-sm">
                	<p class="info text-danger"></p>
                	<form class="text-left">
                        <fieldset>
                        
                        <div class="form-group">
                        	<label for="host">Hostname / Ip</label>
                        	<input id="host" name="host" type="text" placeholder="domain.com" class="form-control input-md">
                            <span class="help-block">Enter a hostname or an IP address. (e.g. domain.com or 169.55.115.210)</span>
                        </div>
                        
                        <div class="form-group">
                        	<label for="ports">Ports</label>
                        	<input id="ports" name="ports" type="text" placeholder="80, 21, 23, 3306" class="form-control input-md">
                            <span class="help-block">Enter comma separated ports. (e.g. 80, 21, 23, 3306)</span>
                        </div>
                        
                        <!-- Button (Double) -->
                        <div class="form-group text-center">
                          <div class="col-md-12">
                            <button id="check" name="check" class="btn btn-success">Check</button>
                            <button id="clear" name="clear" class="btn btn-danger">Clear</button>
                          </div>
                        </div>
                        
                        </fieldset>
                	</form>
                </div>
                <img style="display:none;margin-bottom:20px;" src="img/loader.gif" alt="loader"/>
                <table class="table table-hover text-left data_tb" style="display:none;">
                	<thead>
                        <tr>
                            <th>Hostname / Ip</th>
                            <th>Ports</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        
        


<script src="<?php echo $plug_fl; ?>js/jquery.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/open_port_checker.js"></script>
<script src="<?php echo $plug_fl; ?>js/common.js"></script>


