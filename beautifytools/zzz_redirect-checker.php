






 <link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/redirect_checker.css" media="all"/>
<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/common.css" media="all"/></head>

        
        <div class="row">
        	<div class="col-md-12">
            	<p>Check your URL redirect if it is redirecting properly. Our Redirect Checker checks all url redirections and show them as list along with all redirections data. Our Redirect Checker checks all redirections of a url and list them along with other redirections data. Enter a url with http:// or https:// and click Check Redirect to check redirect of a url.</p>
                <div class="well well-sm">
                	<p class="info text-danger"></p>
                	<form class="form-horizontal" method="post" action="#">
                        <fieldset>
                        
                        <!-- Text input-->
                        <div class="form-group">
                          <div class="col-md-12">
                          <input id="url" name="url" placeholder="http://example.com" class="form-control input-md" type="text">
                            
                          </div>
                        </div>
                        
                        <!-- Button (Double) -->
                        <div class="form-group">
                          <div class="col-md-12">
                            <button id="check_redirect" name="check_redirect" class="btn btn-success">Check Redirect</button>
                            <button id="clear" name="clear" class="btn btn-danger">Clear</button>
                          </div>
                        </div>
                        
                        </fieldset>
                	</form>
                </div>
                <img style="display:none;margin-bottom:15px;" src="img/loader.gif" alt="loader"/>
                <div class="data" style="display:none;"></div>
            </div>
        </div>
            </div>
    

<script src="<?php echo $plug_fl; ?>js/jquery.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/redirect_checker.js"></script>
<script src="<?php echo $plug_fl; ?>js/common.js"></script>


