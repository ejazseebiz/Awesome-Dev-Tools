

 <link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/broken_link_checker.css" media="all"/>
<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/common.css" media="all"/></head>


        
        <div class="row">
        	<div class="col-md-12">
            	<p>Check for broken links on a web page. Our Broken Link Checker tool also checks for broken sources like images, css, scripts and icons. It shows total links, good links and broken links on a web page. Broken Link Checker tool checks for broken links on a web page. It also checks for broken sources like images, css, scripts and icons. It shows a list of good and broken links. It also shows total links, total unique links, total good links and total broken links on a web page. Enter a web page url to check it's broken links.</p>
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
                <img style="display:none;" src="img/s-loading.gif" alt="loading"/>
                <table class="table table-hover text-center data_tb" style="display:none;">
                	<thead>
                        <tr>
                            <th>Total links</th>
                            <th>Total unique links checked</th>
                            <th>Good links</th>
                            <th>Broken links</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <div style="overflow-x:auto;display:none;margin-bottom:20px;" class="links_tb">
                    <table class="table table-hover text-left" style="margin-bottom:0px;">
                        <thead>
                            <tr>
                            	<th style="width:30px;text-align:center;">#</th>
                                <th>Links</th>
                                <th style="width:100px;text-align:center;">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
       
        
    

<script src="<?php echo $plug_fl; ?>js/jquery.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/broken_link_checker.js"></script>
<script src="<?php echo $plug_fl; ?>js/common.js"></script>

