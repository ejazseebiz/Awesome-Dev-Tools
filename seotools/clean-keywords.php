<?php
$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );
?>

<link rel="stylesheet" type="text/css" href="<?php echo $plug_dr; ?>css/bootstrap.min.css" media="all" />

<?php

	$list = "";
	if (isset($_REQUEST['list'])) {
    	$list = $_REQUEST['list'];
	}

    $list = str_replace("\r\n", "\n", $list);
	$list = str_replace(",", "\n", $list);

	// Alright. Now we'll turn the list into an array, and format the words as we do it.

	$orig_arr = explode("\n", $list);
	$new_arr = array();

	foreach($orig_arr as $key) {
		$str = strtolower(trim($key));
		$str = ucwords($str);

		if(!in_array($str, $new_arr)) {
			$new_arr[] = $str;
		}
	}

	// Yes! We're done, now we need to just make the array into a string.

	$result1 = implode(', ', $new_arr); // All in one line
	$result2 = implode('<br />', $new_arr); // All on separate lines

?>

<?php
if (!isset($_REQUEST['list'])) {
?>
<div class="card">
<div class="container">
    <div class="row">
        <div class="col-md-12">


            <form action="" method="POST" style="padding-top: 10px;">


                <div class="input-group">
                    <textarea style="height: 150px;" name="list" class="form-control input-block placeholder">Apples
Oranges
Bananas</textarea>

                    <span class="input-group-btn" style="margin-top:24px; display:inline-block;">
								<button type="submit" class="btn btn-success btn-lg">Continue</button>
							</span>
                </div>
            </form>
        </div>

    </div>
</div>
</div>
<?php
} else {
?>


<div class="card">
		<div class="container">

			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6">
					<div class="well well-lg">
						<div style="overflow-y: auto; max-height: 400px; padding-right: 10px;">
							<?= $result1; ?>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6">
					<div class="well well-lg">
						<div style="overflow-y: auto; max-height: 400px; padding-right: 10px;">
							<?= $result2; ?>
						</div>
					</div>
				</div>
			</div>
</div>
</div>
<?php
							  }
?>