

 <link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/hostname_lookup.css" media="all"/>
<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/common.css" media="all"/></head>


        <div class="row">
        	<div class="col-md-12">
            	<p>Get the hostname of an IP address using Hostname Lookup tool. Hostname Lookup tool resolves the hostname of an IP address. Enter an IP address to get its hostname.</p>
                <div class="well well-sm">
                	<p class="info text-danger"></p>
                	<form class="form-horizontal" action="#" method="post">
                        <fieldset>
                        
                        <!-- Textarea -->
                        <div class="form-group">
                          <div class="col-md-12">                     
                            <input id="ip" name="ip" placeholder="98.139.183.24" class="form-control" type="text">
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
                            <th>Ip</th>
                            <th>Hostname</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
       
    

<script src="<?php echo $plug_fl; ?>js/jquery.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/hostname_lookup.js"></script>
<script src="<?php echo $plug_fl; ?>js/common.js"></script>


