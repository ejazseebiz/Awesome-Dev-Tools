

 <link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/word_counter.css" media="all"/>
<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/common.css" media="all"/></head>

        
        <div class="row">
        	<div class="col-md-12">
            	<p>Word Counter counts the number of words, characters, newlines, spaces etc in a string. Use Word Counter to count the number of words, characters, newlines, spaces etc in a string.</p>
                <div class="well well-sm">
                	<form class="form-horizontal txt_form" action="#" method="post">
                        <fieldset>
                        
                        <!-- Textarea -->
                        <div class="form-group">
                          <div class="col-md-12">                     
                            <textarea style="height:250px;" class="form-control" id="txt" name="txt"></textarea>
                          </div>
                        </div>
                        
                        <!-- Button (Double) -->
                        <div class="form-group">
                          <div class="col-md-12">
                            <button id="count" name="count" class="btn btn-success">Count</button>
                            <button id="clear" name="clear" class="btn btn-danger">Clear</button>
                          </div>
                        </div>
                        
                        </fieldset>
                	</form>
                </div>
                <img style="display:none;margin-bottom:20px;" src="img/loader.gif" alt="loader"/>
                <div class="well well-sm data" style="display:none;"><p><strong>Total&nbsp;words:&nbsp;<span class="words" style="color:#FF0000;">0</span> &nbsp;&nbsp;Total&nbsp;characters:&nbsp;<span class="characters" style="color:#FF0000;">0</span> &nbsp;&nbsp;Total&nbsp;characters&nbsp;(without&nbsp;spaces):&nbsp;<span class="characters_without_spaces" style="color:#FF0000;">0</span> &nbsp;&nbsp;Total&nbsp;lines:&nbsp;<span class="lines" style="color:#FF0000;">0</span> &nbsp;&nbsp;Total&nbsp;spaces:&nbsp;<span class="spaces" style="color:#FF0000;">0</span></strong></p></div>
            </div>
        </div>
           

<script src="<?php echo $plug_fl; ?>js/jquery.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/word_counter.js"></script>
<script src="<?php echo $plug_fl; ?>js/common.js"></script>


