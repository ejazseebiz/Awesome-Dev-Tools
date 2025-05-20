<?php
$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );
?>

<link rel="stylesheet" type="text/css" href="<?php echo $plug_dr; ?>css/bootstrap.min.css" media="all" />

<?php
//	$url = $application->getInput('url');
	$url = $_REQUEST['url'] ?? null;
	include("functions.php");

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
	$data = curl_exec_follow($ch);

	$args = array(
		round(curl_getinfo($ch, CURLINFO_CONNECT_TIME), 5),
		round(curl_getinfo($ch, CURLINFO_NAMELOOKUP_TIME), 5)
	);

	curl_close($ch);
	
?>

<?php
	if (!isset($_POST["doFormPostback"])) {
?>

<div class="card">
    <div class="col-md-12">

        <form action="" method="POST" style="padding-top: 10px;">
            <input type="hidden" name="doFormPostback" value="abc">

            <div class="input-group">
                <input type="text" name="url" class="form-control input-lg input-block placeholder" value="https://www.google.com/">

                <span class="input-group-btn" style="margin-top:16px; display:inline-block;">
								<button type="submit" class="btn btn-success btn-lg">Continue</button>
							</span>
            </div>
        </form>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4">
        <div style="padding: 15px;">

        </div>
    </div>
</div>

<?php } else { ?>

		<div class="card">
			<?php
				$str1 = "It took %1 seconds to connect to %2.";
				$str2 = "It took %1 seconds to lookup the DNS of %2.";

				$str1 = str_replace("%1", $args[0], $str1);
				$str1 = str_replace("%2", $url, $str1);

				$str2 = str_replace("%1", $args[1], $str2);
				$str2 = str_replace("%2", $url, $str2);

				echo $str1 . "<br/><br/>" . $str2;
			?>

		</div>
<?php } ?>