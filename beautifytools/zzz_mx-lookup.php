


 <link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/mx_lookup.css" media="all"/>
<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/common.css" media="all"/></head>

        
        <div class="row">
        	<div class="col-md-12">
            	<p>Get the mail exchanger(mx) records of a domain using MX Lookup tool. Enter a domain to get its mail exchanger(mx) records. MX Lookup tool shows mail exchangers Preference value, Hostname, IP and TTL.</p>
                <div class="well well-sm">
                	<p class="info text-danger"></p>
                	<form class="form-horizontal" action="#" method="post">
                        <fieldset>
                        
                        <!-- Textarea -->
                        <div class="form-group">
                          <div class="col-md-12">                     
                            <input id="url" name="url" placeholder="example.com" class="form-control" type="text">
                          </div>
                        </div>
                        
                        <!-- Button (Double) -->
                        <div class="form-group">
                          <div class="col-md-12">
                            <button id="lookup" name="lookup" class="btn btn-success">Lookup</button>
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
                            <th>Pref</th>
                            <th>Hostname</th>
                            <th>IP</th>
                            <th>TTL</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
     
    

<script src="<?php echo $plug_fl; ?>js/jquery.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/mx_lookup.js"></script>
<script src="<?php echo $plug_fl; ?>js/common.js"></script>

