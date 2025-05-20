<?php
$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/lorem_ipsum_generator.css" media="all"/>
<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/common.css" media="all"/></head>

<div class="card">
        	<div class="card-body">
        <div class="row">
        	<div class="col-md-4">
            	<div class="well well-sm">
                	<div class="info text-danger text-center"></div>
                	<form>
                    	<fieldset>
                        	<div class="form-group">
                              <label for="items_type">Items to generate</label>
                              	<select id="items_type" name="items_type" class="form-control">
                                  <option value="words">Words</option>
                                  <option value="sentences">Sentences</option>
                                  <option value="paragraphs" selected>Paragraphs</option>
                                </select>
                            </div>
                            <div class="form-group">
                              <label for="markup">Include HTML markup</label>
                                <select id="markup" name="markup" class="form-control">
                                  <option value="html">Yes</option>
                                  <option value="plain">No</option>
                                </select>
                            </div>
                            <div class="form-group">
                              <label for="items">How many items to generate</label>  
                              <input id="items" name="items" type="text" placeholder="" class="form-control input-md" value="5">
                            </div>
                            <div class="form-group">
                              <label for="min_words">Minimum words per sentence</label>
                              <input id="min_words" name="min_words" type="text" placeholder="" class="form-control input-md" value="5">
                            </div>
                            <div class="form-group">
                              <label for="max_words">Maximum words per sentence</label>  
                              <input id="max_words" name="max_words" type="text" placeholder="" class="form-control input-md" value="10">
                            </div>
                            <div class="form-group">
                              <label for="min_sentences">Minimum sentences per paragraph</label>                              <input id="min_sentences" name="min_sentences" type="text" placeholder="" class="form-control input-md" value="3">
                            </div>
                            <div class="form-group">
                              <label for="max_sentences">Maximum sentences per paragraph</label>                              <input id="max_sentences" name="max_sentences" type="text" placeholder="" class="form-control input-md" value="5">
                            </div>
                            <div class="form-group text-center">
                            	<button id="generate" name="generate" class="btn btn-primary">Generate</button>
                            </div>
						</fieldset>
                    </form>
                </div>
            </div>
            <div class="col-md-8">
            	<div class="well well-sm">
                	<textarea placeholder="Your result will be shown here" style="height:567px;" class="form-control" id="out" name="out"></textarea>
                </div>
            </div>
        </div>
</div>
</div>
        

<script src="<?php echo $plug_fl; ?>js/jquery.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/lorem-ipsum.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/lorem_ipsum_generator.js"></script>
<script src="<?php echo $plug_fl; ?>js/common.js"></script>


