<?php
	$plug_fl =  plugin_dir_url( __FILE__ );
	$plug_dr =  plugin_dir_url( __DIR__ );
?>
<script src="<?php echo $plug_dr; ?>js/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $plug_dr; ?>css/bootstrap.min.css" media="all" />

<div class="row">
	
	<div class="innerbox" style="margin: 0px 0px 20px;">
		<form>
			<textarea id="html" name="html" class="form-control" rows="12" style="font-size: 12px; line-height: 16px;"><html>
	<head>
		<title>Website Name</title>
	</head>
	<body>
		Hello, world.
	</body>
</html></textarea>
		</form>
	</div>
	
	<div class="row" style="margin: 0px 0px 0px;">
	<div style="border:solid 1px #000;">
		<iframe style="width: 100%; height: 300px;" id="preview" style="border: none;">
			<!DOCTYPE HTML>
			<html lang="en">
				<head>
					<meta charset="utf-8">
				</head>
				<body>
				</body>
			</html>
		</iframe>
</div>
	</div>
	
	<script type="text/javascript">
		$ = jQuery.noConflict(true);
		$(function() {
			function GetHTML() {
				var HTML = $('#html').val();
				return HTML;
			}
			
			$('.innerbox').on("keyup", function() {
				var targetp = $('#preview')[0].contentWindow.document;
				targetp.open();
				targetp.close();
				
				$('body', targetp).append(GetHTML());
			});
			$(document).ready(function() {
				var targetp = $('#preview')[0].contentWindow.document;
				targetp.open();
				targetp.close();
				
				$('body', targetp).append(GetHTML());
			});
		});
	</script>
</div>
	
