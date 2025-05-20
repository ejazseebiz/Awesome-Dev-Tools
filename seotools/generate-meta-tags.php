<?php
$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );
?>

<link rel="stylesheet" type="text/css" href="<?php echo $plug_dr; ?>css/bootstrap.min.css" media="all" />

    <?php
    if (!isset($_POST["doFormPostback"])) {
       
    ?>

<div class="card">
<div class="container">
		<form action="" method="POST">
			<input type="hidden" name="doFormPostback" value="sss">

			<div class="row">
				<div class="col-md-6">
					<h4 style="margin: 0 0 15px 0;">Describe Your Website</h4>
					
					<textarea name="description" class="form-control input-block" rows="2"></textarea>
				</div>
				<div class="col-md-6">
					<h4 style="margin: 0 0 15px 0;">List Your Keywords</h4>
					
					<textarea name="keywords" class="form-control input-block placeholder" rows="2">apples, bananas, oranges</textarea>
				</div>
			</div>

			<div style="height: 30px;"></div>

			<div class="row">
				<div class="col-md-6">
					<h4 style="margin: 0 0 15px 0;">Allow robots to index your website?</h4>
					
					<select name="robots_index" class="form-control input-block">
						<option value="index">Yes</option>
						<option value="noindex">No</option>
					</select>
				</div>
				<div class="col-md-6">
					<h4 style="margin: 0 0 15px 0;">Allow robots to crawl your website?</h4>
					
					<select name="robots_follow" class="form-control input-block">
						<option value="follow">Yes</option>
						<option value="nofollow">No</option>
					</select>
				</div>
			</div>

			<div style="height: 30px;"></div>

			<div class="row">
				<div class="col-md-6">
					<h4 style="margin: 0 0 15px 0;">What type of content will your site display?</h4>
					
					<select name="content_type" class="form-control input-block">
						<option value="text/html; charset=utf-8">UTF-8 (recommended")</option>
						<option value="text/html; charset=iso-8859-1">ISO-8859-1</option>
					</select>
				</div>
				<div class="col-md-6">
					<h4 style="margin: 0 0 15px 0;">What is your site's primary language?</h4>
					
					<select name="language" class="form-control input-block">
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
						<option value="N/A">Other</option>
					</select>
				</div>
			</div>

			<hr />
			<button type="submit" class="btn btn-success btn-lg">Continue</button>
		</form>
	</div>

    <?php
    } else {
    ?>

    <?php

    $description =$_POST["description"];
    $keywords =$_REQUEST["keywords"];

    $robots_index =$_REQUEST["robots_index"];
    $robots_follow =$_REQUEST["robots_follow"];
    $content_type =$_REQUEST["content_type"];
    $language =$_REQUEST["language"];

    $description = str_replace("\r\n", "\n", $description);
    $description = str_replace("\n", "", $description);
    $description = str_replace('"', "", $description);

    $keywords = str_replace("\r\n", "\n", $keywords);
    $keywords = str_replace("\n", "", $keywords);
    $keywords = str_replace('"', "", $keywords);

    $code = '';

    // Let's compile it all.

    $code .= '<meta name="description" content="' . $description . '">' . PHP_EOL;
    $code .= '<meta name="keywords" content="' . $keywords . '">' . PHP_EOL;
    $code .= '<meta name="robots" content="' . $robots_index . ', ' . $robots_follow . '">' . PHP_EOL;
    $code .= '<meta name="language" content="' . $language . '">' . PHP_EOL;
    $code .= '<meta http-equiv="Content-Type" content="' . $content_type . '">' . PHP_EOL;

    $code = str_replace("<", "&lt;", $code);
    $code = str_replace(">", "&gt;", $code);

    $done = true;
    ?>

    <div class="container">
    <pre><?php
        echo $code;
        ?></pre>
    </div>

	</div>
<?php
	}
?>