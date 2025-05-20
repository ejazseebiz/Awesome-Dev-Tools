<?php
$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );
?>

<link rel="stylesheet" type="text/css" href="<?php echo $plug_dr; ?>css/bootstrap.min.css" media="all" />



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


<?php
//	$url = $application->getInput("url");
	$url = $_REQUEST['url'];
    $url = str_ireplace("www.", "", $url);

	$link = parse_url($url);
	$domain = $link['host'];

	function getAddresses($domain) {
	  $records = dns_get_record($domain);
	  $res = array();
	  foreach ($records as $r) {
		if ($r['host'] != $domain) continue; // glue entry
		if (!isset($r['type'])) continue; // DNSSec

		if ($r['type'] == 'A') $res[] = $r['ip'];
		if ($r['type'] == 'AAAA') $res[] = $r['ipv6'];
	  }
	  return $res;
	}

	function getAddresses_www($domain) {
	  $res = getAddresses($domain);
	  if (count($res) == 0) {
		$res = getAddresses('www.' . $domain);
	  }
	  return $res;
	}

	$ip = getAddresses_www($domain);
	$ip = $ip[count($ip)-1];
	if(!$ip) {
		$ip = getAddresses_www("http://".$domain);
		$ip = $ip[count($ip)-1];

		if(!$ip) $ip = "?";
	}

	$string = "The IP address of %1 is %2.";
	$string = str_replace("%1", $domain, $string);
	$string = str_replace("%2", "<strong>{$ip}</strong>", $string);
?>

		<div class="card">
			<?php
				echo $string;
			?>


		</div>
<?php } ?>
