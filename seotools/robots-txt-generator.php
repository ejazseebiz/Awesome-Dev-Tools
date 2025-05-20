<?php
$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );

?>

<link rel="stylesheet" type="text/css" href="<?php echo $plug_dr; ?>css/bootstrap.min.css" media="all" />


<?php
	$title = "Robots.txt Generator - Server & Robots";
	
	$code = "Press Generate Code for the code to appear here.";
	
	if(isset($_POST['go'])) {
		$code = '';
		
		$engines = array(
			'Googlebot',
			'Googlebot-Image',
			'Googlebot-Mobile',
			'MSNBot',
			'PSBot',
			'Slurp',
			'Yahoo-MMCrawler',
			'yahoo-blogs/v3_9',
			'teoma',
			'Scrubby',
			'ia_archiver'
		);
		
		foreach($engines as $i) {
			$code .= 'User-agent: ' . $i . PHP_EOL;
			
			$code .= 'Disallow: ';
			if(!$_POST[$i]) $code .= "/";
			$code .= PHP_EOL . PHP_EOL;
		}
	}
?>

<div class="card">
	
	<!-- <div class="page-header">
		<h2>Robots.txt Generator</h2>
	</div> -->
	
	<form action="" method="POST">
	<input type="hidden" name="go" value="true">
	
	<div class="row" style="margin-left: 0px;">
		<div class="span7">
			<p style="margin-bottom: 20px;">
				Please select which of the following web crawlers / engines you wish to allow access to your website. If you turn the engine ON, they will
				crawl and index the website. If you turn it OFF, they will not crawl nor index the website.
			</p>
			
			<div class="row" style="margin: 0px 0px 20px 0px;">
				<div class="col-sm-3">
					<center>
						<label for="cb1">Googlebot</label>
						<div class="switch">
							<input id="cb1" type="checkbox" checked name="Googlebot" />
						</div>
					</center>
				</div>
				<div class="col-sm-3">
					<center>
						<label for="cb2">Google Image</label>
						<div class="switch">
							<input id="cb2" type="checkbox" checked name="Googlebot-Image" />
						</div>
					</center>
				</div>
				<div class="col-sm-3">
					<center>
						<label for="cb3">Google Mobile</label>
						<div class="switch">
							<input id="cb3" type="checkbox" checked name="Googlebot-Mobile" />
						</div>
					</center>
				</div>
				<div class="col-sm-3">
					<center>
						<label for="cb4">MSNBot</label>
						<div class="switch">
							<input id="cb4" type="checkbox" checked name="MSNBot" />
						</div>
					</center>
				</div>
			</div>
			<div class="row" style="margin: 0px 0px 20px 0px;">
				<div class="col-sm-3">
					<center>
						<label for="cb5">PSBot</label>
						<div class="switch">
							<input id="cb5" type="checkbox" checked name="PSBot" />
						</div>
					</center>
				</div>
				<div class="col-sm-3">
					<center>
						<label for="cb6">Slurp</label>
						<div class="switch">
							<input id="cb6" type="checkbox" checked name="Slurp" />
						</div>
					</center>
				</div>
				<div class="col-sm-3">
					<center>
						<label for="cb7">Yahoo MM</label>
						<div class="switch">
							<input id="cb7" type="checkbox" checked name="Yahoo-MMCrawler" />
						</div>
					</center>
				</div>
				<div class="col-sm-3">
					<center>
						<label for="cb8">Yahoo Blogs</label>
						<div class="switch">
							<input id="cb8" type="checkbox" checked name="yahoo-blogs/v3.9" />
						</div>
					</center>
				</div>
			</div>
			<div class="row" style="margin: 0px 0px 20px 0px;">
				<div class="col-sm-3">
					<center>
						<label for="cb9">Teoma</label>
						<div class="switch">
							<input id="cb9" type="checkbox" checked name="teoma" />
						</div>
					</center>
				</div>
				<div class="col-sm-3">
					<center>
						<label for="cb10">Scrubby</label>
						<div class="switch">
							<input id="cb10" type="checkbox" checked name="Scrubby" />
						</div>
					</center>
				</div>
				<div class="col-sm-3">
					<center>
						<label for="cb11">IA Archiver</label>
						<div class="switch">
							<input id="cb11" type="checkbox" checked name="ia_archiver" />
						</div>
					</center>
				</div>
			</div>
			
		</div>
		<div class="span5">
			<div class="well">
				<button class="btn btn-large span6 btn-success" type="submit">Generate Code</button>
				
				<div class="clearfix"></div>
			</div>
			<div class="well">
				<p>Here is the generated code. Please paste this into a blank htaccess file, or click the download button above.</p>
				
				<pre><?=$code;?></pre>
			</div>
		</div>
	</div>
</div>

</form>

<style type='text/css'>
	.valign-middle { vertical-align: middle !important; }
	input, select { margin-bottom: 0px !important; }
</style>

