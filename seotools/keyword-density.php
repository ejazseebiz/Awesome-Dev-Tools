<?php
$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );
?>

<link rel="stylesheet" type="text/css" href="<?php echo $plug_dr; ?>css/bootstrap.min.css" media="all" />

<?php
include("functions.php");
//	$url = $application->getInput('url');
if (isset($_POST["doFormPostback"])) {
	$url = $_REQUEST['url'];
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
	$data = curl_exec_follow($ch);
	curl_close($ch);
	
	$data = str_replace(array(
    "  ", " \t",  " \r",  " \n",
    "\t\t", "\t ", "\t\r", "\t\n",
    "\r\r", "\r ", "\r\t", "\r\n",
    "\n\n", "\n ", "\n\t", "\n\r", ".", "(", ")", ",", ":", "!", "@", "#", "$", "%", "^", "&", "*", "}", "{", "[", "]", ";"), " ", $data);
    $data = str_replace(">", "> ", $data);
	$data = preg_replace('/<head\b[^>]*>(.*?)<\/head>/is', " ", $data);
	$data = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', " ", $data);
	$data = preg_replace('/<style\b[^>]*>(.*?)<\/style>/is', " ", $data);
	$data = preg_replace('/<noscript\b[^>]*>(.*?)<\/noscript>/is', " ", $data);
	$data = strip_tags($data);
	$data = preg_replace('/(\s)+/', ' ', $data);
	$data = preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $data);

	$totalWords = 0;
	$tmp = explode(" ", $data);
	$words = array();

	foreach($tmp as $word) {
		if(isset($words[$word])) {
			$words[$word] = $words[$word] + 1;
		}
		else {
			if(strlen($word) >= 2 && substr($word, 0, 1) !== "&") {
				$words[$word] = 1;
			}
		}
		
		if(strlen($word) >= 2 && substr($word, 0, 1) !== "&") {
			$totalWords++;
		}
	}

	arsort($words);
	$newWords = array();

	foreach($words as $word=>$count) {
		$newWords[] = array(
			'keyword' => ucfirst($word),
			'count' => $count,
			'percent' => round((($count / $totalWords) * 100), 2)
		);
	}

	$words = $newWords;
}
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

                <span class="input-group-btn"  style="margin-top:16px; display:inline-block;">
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
			<table class="table">
				<thead>
					<tr>
						<th>Keyword</th>
						<th width='20%'>Count</th>
						<th width='20%'>%</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($words as $w) { ?>
					<tr>
						<td><?=$w['keyword'];?></td>
						<td><?=$w['count'];?></td>
						<td><?=$w['percent'];?>%</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>

<?php
			 } 
?>