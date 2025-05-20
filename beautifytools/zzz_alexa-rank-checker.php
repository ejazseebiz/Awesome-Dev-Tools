



 
 
        
        <div class="row">
        	<div class="col-md-12">
            	<p>Get the Alexa Global Rank and Country Rank of a website. Alexa Rank Checker also shows various Alexa graphs such as global rank trend, page views, bounce rate, time on site etc.</p>
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
                <table class="table table-hover text-left data_tb" style="display:none;">
                	<thead>
                        <tr>
                        	<th>Domain</th>
                            <th>Global Rank</th>
                            <th>Country Rank</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <div class="well well-sm graph" style="display:none;">
                	<img src="img/loading.gif" alt="alexa rank" style="margin-bottom:5px;width:100%;" class="g1"/>
                    <img src="img/loading.gif" alt="alexa rank" style="margin-bottom:5px;width:100%;" class="g2"/>
                    <img src="img/loading.gif" alt="alexa rank" style="margin-bottom:5px;width:100%;" class="g3"/>
                    <img src="img/loading.gif" alt="alexa rank" style="margin-bottom:5px;width:100%;" class="g4"/>
                    <img src="img/loading.gif" alt="alexa rank" style="margin-bottom:5px;width:100%;" class="g5"/>
                    <img src="img/loading.gif" alt="alexa rank" style="margin-bottom:5px;width:100%;" class="g6"/>
                </div>
            </div>
        </div>
          
        
    

<script src="<?php echo $plug_fl; ?>js/jquery.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/alexa_rank_checker.js"></script>
<script src="<?php echo $plug_fl; ?>js/common.js"></script>


