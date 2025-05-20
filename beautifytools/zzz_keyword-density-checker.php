



 <link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/keyword_density_checker.css" media="all"/>
<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/common.css" media="all"/></head>

        
        <div class="row">
        	<div class="col-md-12">
            	<p>Keyword Density Checker tool helps you find the most common keywords on a web page. It analyses the density, repetition of keywords and shows the data in an order. Enter a page url to check the keyword density of a web page. Keyword Density Checker will calculate the density of all keywords and show the data in an order.</p>
                <div class="well well-sm">
                	<p class="info text-danger"></p>
                	<form class="form-horizontal" action="#" method="post">
                        <fieldset>
                        
                        <!-- Textarea -->
                        <div class="form-group">
                          <div class="col-md-12">                     
                            <input id="url" name="url" placeholder="Enter page url" class="form-control" type="text">
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
                <table class="table table-hover text-left info_tb" style="display:none;">
                	<thead>
                        <tr>
                            <th>Page url</th>
                            <th>Total words</th>
                            <th>Total keywords</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <table class="table table-hover text-left density_tb" style="display:none;">
                	<thead>
                        <tr>
                            <th>#</th>
                            <th>Keyword</th>
                            <th>Density</th>
                            <th>Count</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>

        
  
            

<script src="<?php echo $plug_fl; ?>js/jquery.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/keyword_density_checker.js"></script>
<script src="<?php echo $plug_fl; ?>js/common.js"></script>


