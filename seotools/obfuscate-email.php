<?php
$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );
?>

<link rel="stylesheet" type="text/css" href="<?php echo $plug_dr; ?>css/bootstrap.min.css" media="all" />

<?php
$email = "";
if (isset($_REQUEST['email'])) {
    $email = $_REQUEST['email'];

}

//	$email = $application->getInput('email');
	
	$link = $email;
	$obfuscatedLink = "";
	$obfuscatedLink2 = "";
	for ($i=0; $i<strlen($link); $i++){
		$obfuscatedLink .= "&amp;#" . ord($link[$i]) . ";";
		$obfuscatedLink2 .= "&#" . ord($link[$i]) . ";";
	}
?>

<?php
	if (!isset($_POST["doFormPostback"])) {
?>


<div class="card">


    <h4>Enter an email address to continue</h4>


    <form action="" method="POST" style="padding-top: 10px;">
        <input type="hidden" name="doFormPostback" value="abc">

        <div class="input-group">
            <input type="text" name="email" class="form-control input-lg input-block placeholder" value="john.doe@example.com">

            <span class="input-group-btn" style="margin-top:16px; display:inline-block;">
                <button type="submit" class="btn btn-success btn-lg">Continue</button>
							</span>
        </div>
    </form>
</div>
<?php } else { ?>
	<div class="card">
		<div class="row">
			<div class="col-md-6">
				Plain obfuscated email<br /><br />
				<pre><?=$obfuscatedLink;?></pre>
				<hr />
				<strong>Preview: </strong> <?=$obfuscatedLink2;?>
			</div>
			<div class="col-md-6">
				Obfuscated email in HTML link<br /><br />
				<pre>&lt;a href="mailto:<?=$obfuscatedLink2;?>"&gt;<?=$obfuscatedLink2;?>&lt;/a&gt;</pre>
				<hr />
				<strong>Preview: </strong> <a href="mailto:<?=$obfuscatedLink2;?>"><?=$obfuscatedLink2;?></a>
			</div>
		</div>
	</div>
<?php
			 } 
?>