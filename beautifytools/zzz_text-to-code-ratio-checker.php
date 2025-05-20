
 <link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/text_to_code_ratio_checker.css" media="all"/>
<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/common.css" media="all"/></head>

        
        <div class="row">
        	<div class="col-md-12">
            	<p>Calculate text to code ratio of a web page. Text To Code Ratio Checker shows text to code ratio, page size, code size and text size of a web page. Text To Code Ratio Checker shows text to code ratio, page size, code size and text size of a web page. A higher text to code ratio has a better chance of getting a good position in search engines. A text to code ratio of 15% or higher is considered good SEO.</p>
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
                            <th>Page Size</th>
                            <th>Code Size</th>
                            <th>Text Size</th>
                            <th>Text To Code Ratio</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    
        

<script src="<?php echo $plug_fl; ?>js/jquery.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/text_to_code_ratio_checker.js"></script>
<script src="<?php echo $plug_fl; ?>js/common.js"></script>


