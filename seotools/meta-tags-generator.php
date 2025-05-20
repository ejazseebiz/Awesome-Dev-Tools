<?php
$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );

?>

<link rel="stylesheet" type="text/css" href="<?php echo $plug_dr; ?>css/bootstrap.min.css" media="all" />

<?php

	$code = "";
	$done = false;

	if(isset($_POST['go'])) {
		$code = "";
// exit;
		
		// Define Variables //
		// Feel free to add your own! //
		
		$description 		= $_POST['description'];
		$keywords 			= $_POST['keywords'];
		$robots 			= $_POST['robotss'];
		$revisitAfter 		= $_POST['revisit'];
		$contentType		= $_POST['content_type'];
		$webLanguage 		= $_POST['language'];
		$webGenerator 		= $_POST['generator'];
		
		// Before we begin, we need to format some of these variables.
		
		$description = str_replace("\r\n", "\n", $description);
		$description = str_replace("\n", "", $description);
		$description = str_replace('"', "", $description);
		
		$keywords = str_replace("\r\n", "\n", $keywords);
		$keywords = str_replace("\n", "", $keywords);
		$keywords = str_replace('"', "", $keywords);
		
		// Let's compile it all.
		
		$code .= '<meta name="description" content="' . $description . '">' . PHP_EOL;
		$code .= '<meta name="keywords" content="' . $keywords . '">' . PHP_EOL;
		$code .= '<meta name="robots" content="' . $robots . '">' . PHP_EOL;
		$code .= '<meta name="revisit-after" content="' . $revisitAfter . '">' . PHP_EOL;
		$code .= '<meta name="language" content="' . $webLanguage . '">' . PHP_EOL;
		$code .= '<meta name="generator" content="' . $webGenerator . '">' . PHP_EOL;
		$code .= '<meta http-equiv="Content-Type" content="' . $contentType . '">' . PHP_EOL;
		
		$code = str_replace("<", "&lt;", $code);
		$code = str_replace(">", "&gt;", $code);
		
		$done = true;
	}
?>

<div class="card">
	
	<?php if($done == false) { ?>
	<form action="" method="POST">
		<input type="hidden" name="go" value="true">
		
		<div class="row">
			<div class="well span12">
				<h3 style="margin: 0px 0px 5px 0px;">Description</h3>
				<p>Give us a description of what your webpage or website does, and why people should visit it.</p>
				
				<textarea name="description" class="form-control" rows="2"></textarea>
			</div>
		</div>
		
		<div class="row">
			<div class="well span12">
				<h3 style="margin: 0px 0px 5px 0px;">Keywords</h3>
				<p>Below, provide us a list of all your keywords, separated by either commas or new lines.</p>
				
				<textarea name="keywords" class="form-control" rows="2"></textarea>
			</div>
		</div>
		
		<div class="row">
			<div class="well span4">
				<h3 style="margin: 0px 0px 5px 0px;">Robots</h3>
				<p>How will robots crawl your site?</p>
				
				<select name="robotss" class="form-control">
					<option value="index, follow">Crawl every page and index them</option>
					<option value="index, nofollow">Index this page but do not crawl others</option>
					<option value="noindex, follow">Crawl each page but do not index this one</option>
					<option value="noindex, nofollow">Do not crawl other pages nor index this page</option>
				</select>
			</div>
			
			<div class="well span4">
				<h3 style="margin: 0px 0px 5px 0px;">Revisits</h3>
				<p>How often should crawlers visit?</p>
				
				<select name="revisit" class="form-control">
					<option value="1 day">Every day</option>
					<option value="7 day">Every week</option>
					<option value="14 day">Every 2 weeks</option>
					<option value="1 month">Every month</option>
				</select>
			</div>
			
			<div class="well span4">
				<h3 style="margin: 0px 0px 5px 0px;">Content Type</h3>
				<p>What content type should we use?</p>
				
				<select name="content_type" class="form-control">
					<option value="text/html; charset=utf-8">UTF-8 (recommended)</option>
					<option value="text/html; charset=iso-8859-1">ISO-8859-1</option>
				</select>
			</div>
		</div>
		
		<div class="row">
			<div class="well span4">
				<h3 style="margin: 0px 0px 5px 0px;">Language</h3>
				<p>What language is your site?</p>
				
				<select name="language" class="form-control">
					<option value="English">English</option>
					<option value="Spanish">Spanish</option>
					<option value="Mandarin">Mandarin</option>
					<option value="Japanese">Japanese</option>
					<option value="Korean">Korean</option>
					<option value="French">French</option>
					<option value="Portuguese">Portuguese</option>
					<option value="Malay-Indonesian">Malay-Indonesian</option>
					<option value="Bengali">Bengali</option>
					<option value="Arabic">Arabic</option>
					<option value="Russian">Russian</option>
					<option value="Hindustani">Hindustani</option>
					<option value="N/A">Other...</option>
				</select>
			</div>
			
			<div class="well span4">
				<h3 style="margin: 0px 0px 5px 0px;">Generator</h3>
				<p>How was your website built?</p>
				
				<select name="generator" class="form-control">
					<option value="N/A">I made it from HTML!</option>
					<option value="WordPress">WordPress</option>
					<option value="Dreamweaver">Dreamweaver</option>
					<option value="EditPlus">EditPlus</option>
					<option value="Frontpage">Frontpage</option>
					<option value="Joomla">Joomla</option>
					<option value="N/A">Other</option>
					<option value="N/A">Unknown</option>
				</select>
			</div>
		</div>
		
		<div class="row">
			<div class="well span12">
				<button class="btn btn-large btn-block btn-success" type="submit">Generate Meta Code</button>
			</div>
		</div>
	</form>
	
	<?php } else { ?>
		
	<div class="row">
		<div class="alert alert-success">
			<strong>Great!</strong> We have finished making the HTML code for your meta tags.
		</div>
	</div>
	<div class="row">
		<div class="well span12">
			<pre><?=$code;?></pre>
		</div>
	</div>

	<?php } ?>
</div>


<style type='text/css'>
	.valign-middle { vertical-align: middle !important; }
	input, select { margin-bottom: 0px !important; }
</style>
