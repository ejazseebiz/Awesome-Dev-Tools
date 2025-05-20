


 <link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/semrush_rank_checker.css" media="all"/>
<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/common.css" media="all"/></head>

        
        <div class="row">
        	<div class="col-md-12">
            	<p>Check Semrush Rank of a website. Semrush Rank Checker shows Semrush Rank, Keywords, Traffic and Cost of a website. It also shows various seo graphs of a website. Semrush Rank Checker shows Semrush Rank of a website. It also shows various SEO graphs and some Semrush metrics like keywords, search traffic and cost of a website. Keywords is the number of Keywords the site has in the top 20 organic results. Traffic is the estimated number of visitors coming from the first 20 search results (per month). Cost is the estimated cost of purchasing the same number of visitors through Ads. Semrush ranks every website based on its organic traffic. Lower Semrush rank means the site has higher organic traffic.</p>
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
                            <button id="check" name="check" class="btn btn-success">Check</button>
                            <button id="clear" name="clear" class="btn btn-danger">Clear</button>
                          </div>
                        </div>
                        
                        </fieldset>
                	</form>
                </div>
                <img style="display:none;margin-bottom:20px;" src="img/loader.gif" alt="loader"/>
                <div class="data_tb" style="display:none;overflow-x:auto;margin-bottom:20px;">
                    <table class="table table-hover text-left" style="margin-bottom:0px;">
                        <thead>
                            <tr>
                                <th>Domain</th>
                                <th>Rank</th>
                                <th>Keywords</th>
                                <th>Traffic</th>
                                <th>Cost (USD)</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="well well-sm graph" style="display:none;">
                	<img src="img/loading.gif" alt="semrush rank" style="margin-bottom:5px;width:100%;" class="g1"/>
                    <img src="img/loading.gif" alt="semrush rank" style="margin-bottom:5px;width:100%;" class="g2"/>
                    <img src="img/loading.gif" alt="semrush rank" style="margin-bottom:5px;width:100%;" class="g3"/>
                    <img src="img/loading.gif" alt="semrush rank" style="margin-bottom:5px;width:100%;" class="g4"/>
                    <img src="img/loading.gif" alt="semrush rank" style="margin-bottom:5px;width:100%;" class="g5"/>
                </div>
            </div>
        </div>
      
        
    

<script src="<?php echo $plug_fl; ?>js/jquery.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/semrush_rank_checker.js"></script>
<script src="<?php echo $plug_fl; ?>js/common.js"></script>


