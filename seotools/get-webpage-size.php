<?php
$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );
?>

<link rel="stylesheet" type="text/css" href="<?php echo $plug_dr; ?>css/bootstrap.min.css" media="all" />

<?php
include("functions.php");
//	$url = $application->getInput("url");
if (isset($_POST["doFormPostback"])) {
	$url = $_REQUEST['url'];
	function bytesToSize($bytes, $precision = 2) {  
		$kilobyte = 1024;
		$megabyte = $kilobyte * 1024;
		$gigabyte = $megabyte * 1024;
		$terabyte = $gigabyte * 1024;
	   
		if (($bytes >= 0) && ($bytes < $kilobyte)) {
			return $bytes . ' B';
	 
		} elseif (($bytes >= $kilobyte) && ($bytes < $megabyte)) {
			return round($bytes / $kilobyte, $precision) . ' KB';
	 
		} elseif (($bytes >= $megabyte) && ($bytes < $gigabyte)) {
			return round($bytes / $megabyte, $precision) . ' MB';
	 
		} elseif (($bytes >= $gigabyte) && ($bytes < $terabyte)) {
			return round($bytes / $gigabyte, $precision) . ' GB';
	 
		} elseif ($bytes >= $terabyte) {
			return round($bytes / $terabyte, $precision) . ' TB';
		} else {
			return $bytes . ' B';
		}
	}
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
	$data = curl_exec_follow($ch);
	curl_close($ch);
	
	$bytes = strlen($data);
	$size = bytesToSize($bytes);
	
	if(function_exists("mb_strlen")) {
		$len = number_format(mb_strlen($data));
	}
	else {
		$len = "Error. Mbstring extension is not installed.";
	}
}
?>
<?php
	if (!isset($_POST["doFormPostback"])) {
?>
<div class="card">
<div class="row">
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
				</div>
<?php } else { ?>
	<div class="card">
		<div class="container">
			<table class="table">
				<thead>
					<tr>
						<th>Reading</th>
						<th>Value</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><b>Webpage Length</b></td>
						<td><?=$len;?></td>
					</tr>
					<tr>
						<td><b>Webpage Size</b></td>
						<td><?=$size;?></td>
					</tr>
				</tbody>
			</table>

		</div>
</div>
<?php
			 } 
?>