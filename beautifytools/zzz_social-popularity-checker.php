


 <link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/social_popularity_checker.css" media="all"/>
<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/common.css" media="all"/></head>

        
        <div class="row">
        	<div class="col-md-12">
            	<p>Social Popularity Checker shows the number of shares, likes, comments, reach and clicks of a website or a url on some popular social networking sites. Check popularity of a website or a url on different social networks. Social Popularity Checker shows the number of shares, likes, comments, reach and clicks of a website or a url on some popular social networking sites.</p>
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
                <table class="table table-hover text-left data_tb" style="display:none;">
                	<thead>
                        <tr>
                        	<th>&nbsp;</th>
                            <th>Social Media</th>
                            <th>Count</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
   
        

<script src="<?php echo $plug_fl; ?>js/jquery.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/social_popularity_checker.js"></script>
<script src="<?php echo $plug_fl; ?>js/common.js"></script>


