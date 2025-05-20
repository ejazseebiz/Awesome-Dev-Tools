
 <link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/nameserver_lookup.css" media="all"/>
<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/common.css" media="all"/></head>

        
        <div class="row">
        	<div class="col-md-12">
            	<p>Get the nameservers of a domain using Nameserver Lookup tool. Nameserver Lookup tool resolves the nameservers of a domain. Enter a domain to get its nameservers.</p>
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
                            <th>Domain</th>
                            <th>Nameserver &amp; Ip</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
         
        
    

<script src="<?php echo $plug_fl; ?>js/jquery.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/nameserver_lookup.js"></script>
<script src="<?php echo $plug_fl; ?>js/common.js"></script>


