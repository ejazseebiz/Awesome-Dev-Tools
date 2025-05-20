<?php
$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );
?>
 <!-- <link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/jquery-ui.min.css" media="all"/> -->
<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/html_form_builder.css" media="all"/>
<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/common.css" media="all"/></head>

<div class="card">
        	<div class="card-body">
                <p>Drag and drop HTML Form Builder for websites. It can generate Bootstrap friendly html form. All form elements are editable.</p>
                <div class="well well-sm">
                    <div id="build-wrap"></div>
                    <div id="build-preview" style="display:none">
                        <form action="#"></form>
                    </div>
                        <div class="btn-group" style="margin-top: 10px;" role="group">
                            <button type="button" id="preview" class="btn btn-info">Preview</button>
                            <button type="button" id="getHTML" class="btn btn-success">Get HTML</button>
                            <button type="button" id="getXML" class="btn btn-success">Get XML</button>
                            <button type="button" id="getJSON" class="btn btn-success">Get JSON</button>
                            <button type="button" id="clear" class="btn btn-danger">Clear</button>
                        </div>
                </div>
                <div class="well well-sm" id="outDiv" style="display:none;">
                    <textarea style="height:500px;" class="form-control" id="out" name="out"></textarea>
                </div>
            </div>
        </div>
    

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/vkbeautify.min.js"></script>


<script src="<?php echo $plug_fl; ?>js/js-beautify/js/lib/beautify.js"></script>
<script src="<?php echo $plug_fl; ?>js/js-beautify/js/lib/beautify-css.js"></script>
<script src="<?php echo $plug_fl; ?>js/js-beautify/js/lib/beautify-html.js"></script>
<script src="<?php echo $plug_fl; ?>js/form-builder.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/form-render.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/html_form_builder.js"></script>
<script src="<?php echo $plug_fl; ?>js/common.js"></script>



<script>
// jQuery($ => {
//   $('#build-preview').formBuilder()
// })

// jQuery($ => {
//   const fbTemplate = document.getElementById('build-wrap');
//   $(fbTemplate).formBuilder();
// });
</script>
