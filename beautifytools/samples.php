


 <link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/jquery-ui.min.css" media="all"/>
<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/samples.css" media="all"/>
<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/common.css" media="all"/></head>


        
<div class="card">
        	<div class="card-body">
            	<p>Select a sample and get sample data to test our various tools.</p>
                <div class="well well-sm">
                	<form class="form-inline text-center" style="margin:10px;">
                    <fieldset>
                    
                    <!-- Select Basic -->
                    <div class="form-group">
                      <label for="sample">Select a sample to get sample data:&nbsp;</label>
                     	<select id="sample" name="sample" class="form-control">
                        	<option value="css">css</option>
                            <option value="csv">csv</option>
                            <option value="html">html</option>
                            <option value="javascript" selected>javascript</option>
                            <option value="json">json</option>
                            <option value="opml">opml</option>
                            <option value="php">php</option>
                            <option value="sql">sql</option>
                            <option value="xml">xml</option>
                            <option value="yaml">yaml</option>
                            <option value="less">less</option>
                            <option value="rss">rss</option>
                            <option value="sass">sass</option>
                            <option value="scss">scss</option>
                            <option value="stylus">stylus</option>
                        </select>
                    </div>
                    
                    <!-- Button -->
                    <div class="form-group">
                      <div class="col-md-4">
                        <button id="copy" name="copy" class="btn btn-info">Copy&nbsp;data</button>
                      </div>
                    </div>
                    
                    </fieldset>
                    </form>
                	<div id="code1"></div>
                </div>
            </div>
</div>
    

<script src="<?php echo $plug_fl; ?>js/jquery.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/jquery-ui.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/zclip/jquery.zclip.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/ace/src-min-noconflict/ace.js"></script>
<script src="<?php echo $plug_fl; ?>js/ace/src-min-noconflict/ext-language_tools.js"></script>
<script src="<?php echo $plug_fl; ?>js/samples.js"></script>
<script src="<?php echo $plug_fl; ?>js/common.js"></script>


