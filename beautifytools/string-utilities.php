<?php
$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/string_utilities.css" media="all"/>
<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/common.css" media="all"/></head>

        
<div class="card">
        	<div class="card-body">
            	<p>Enter a string below and select what you want to do with the string and click Go to start the string manipulation.</p>
                <div class="well well-sm">
                	<form class="form-horizontal">
                        <fieldset>
                        
                        <!-- Textarea -->
                        <div class="form-group">
                          <div class="col-md-12">                     
                            <textarea style="height:250px;" class="form-control" id="data" name="data" placeholder="Enter string here"></textarea>
                          </div>
                        </div>
                        
                        <!-- Multiple Radios -->
                        <div class="row">
                          <div class="col-md-6">
                          <div class="radio">
                            <label for="radios-0">
                              <input type="radio" name="radios" id="radios-0" value="camelize" checked="checked">
                              Remove any underscores or dashes and convert a string into camel casing.
                            </label>
                            </div>
                          <div class="radio">
                            <label for="radios-1">
                              <input type="radio" name="radios" id="radios-1" value="capitalize">
                              Capitalize the first character of the first word of sentences.
                            </label>
                            </div>
                          <div class="radio">
                            <label for="radios-2">
                              <input type="radio" name="radios" id="radios-2" value="collapseWhitespace">
                              Convert all adjacent whitespace characters to a single space.
                            </label>
                            </div>
                          <div class="radio">
                            <label for="radios-3">
                              <input type="radio" name="radios" id="radios-3" value="dasherize">
                              Make a converted camel cased string into a string delimited by dashes.
                            </label>
                            </div>
                          <div class="radio">
                            <label for="radios-4">
                              <input type="radio" name="radios" id="radios-4" value="decodeHTMLEntities">
                              Decode HTML entities into their string representation.
                            </label>
                            </div>
                          <div class="radio">
                            <label for="radios-5">
                              <input type="radio" name="radios" id="radios-5" value="escapeHTML">
                              Escape the html markups.
                            </label>
                            </div>
                          <div class="radio">
                            <label for="radios-6">
                              <input type="radio" name="radios" id="radios-6" value="latinise">
                              Remove accents from Latin characters.
                            </label>
                            </div>
                          
                            <div class="radio">
                            <label for="radios-7">
                              <input type="radio" name="radios" id="radios-7" value="length">
                              Count the length of the string.
                            </label>
                            </div>
                          </div>
                          <div class="col-md-6">
                          
                          <div class="radio">
                            <label for="radios-8">
                              <input type="radio" name="radios" id="radios-8" value="lines">
                              Count newlines of the string.
                            </label>
                            </div>
                          <div class="radio">
                            <label for="radios-9">
                              <input type="radio" name="radios" id="radios-9" value="slugify">
                              Remove accents from Latin characters and Convert the text into a valid url slug.
                            </label>
                            </div>
                          <div class="radio">
                            <label for="radios-10">
                              <input type="radio" name="radios" id="radios-10" value="titleCase">
                              Make the string with the first letter of each word uppercased.
                            </label>
                            </div>
                          <div class="radio">
                            <label for="radios-11">
                              <input type="radio" name="radios" id="radios-11" value="underscore">
                              Make converted camel cased string into a string delimited by underscores.
                            </label>
                            </div>
                          <div class="radio">
                            <label for="radios-12">
                              <input type="radio" name="radios" id="radios-12" value="unescapeHTML">
                              Unescape the html markups.
                            </label>
                            </div>
                          <div class="radio">
                            <label for="radios-13">
                              <input type="radio" name="radios" id="radios-13" value="mlowercase">
                              Make all characters lowercase.
                            </label>
                            </div>
                          <div class="radio">
                            <label for="radios-14">
                              <input type="radio" name="radios" id="radios-14" value="muppercase">
                              Make all characters uppercase.
                            </label>
                            </div>
                          <div class="radio">
                            <label for="radios-15">
                              <input type="radio" name="radios" id="radios-15" value="reverse">
                              Reverse all characters.
                            </label>
                            </div>
                          <div class="radio">
                            <label for="radios-16">
                              <input type="radio" name="radios" id="radios-16" value="csentence">
                              Count all sentences.
                            </label>
                            </div>
                          <div class="radio">
                            <label for="radios-17">
                              <input type="radio" name="radios" id="radios-17" value="cword">
                              Count all words.
                            </label>
                            </div>
                          </div>
                        </div>
                        
                        <!-- Button (Double) -->
                        <div class="form-group text-center">
                          <div class="col-md-12">
                            <button id="go" name="go" class="btn btn-success">Go</button>
                            <button id="clear" name="clear" class="btn btn-danger">Clear</button>
                          </div>
                        </div>
                        
                        </fieldset>
                	</form>
                    <!-- Modal -->
                    <div class="modal fade" id="msg_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Message</h4>
                          </div>
                          <div class="modal-body">
                          	<p class="text-center" id="msg"></p>
                          </div>
                          <div class="modal-footer">
                          	<button data-dismiss="modal" id="ok_msg" name="ok_msg" class="btn btn-success">Ok</button>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
         
        
    

<script src="<?php echo $plug_fl; ?>js/jquery.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/bootstrap.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/string.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/string_utilities.js"></script>
<script src="<?php echo $plug_fl; ?>js/common.js"></script>

