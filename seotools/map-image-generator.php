<?php
	$plug_fl =  plugin_dir_url( __FILE__ );
	$plug_dr =  plugin_dir_url( __DIR__ );
	include("functions.php");
?>

<link rel="stylesheet" type="text/css" href="<?php echo $plug_dr; ?>css/bootstrap.min.css" media="all" />


<?php
	$title = "Map Image Generator - Miscellaneous";

	
	$done = false;
	$images = array();
	
	function MakeSize($size, $address, $scale = 1) {
		$url = "http://maps.google.com/maps/api/staticmap?sensor=true";
		$url .= "&size=" . $size . "x" . $size;
		$url .= "&center=" . urlencode($address);
		$url .= "&zoom=15";
		$url .= "&markers=color:red|" . urlencode($address);
		$url .= "&maptype=roadmap";
		$url .= "&scale=$scale";
		$url .= "&key=AIzaSyCgpXzXA6P3Gc8yrls90-VSq5v4O0jaE0I";
		
		return $url;
	}
	
	if(isset($_POST['address'])) {
		$address = $_POST['address'];
		
		$images['256x256'] = MakeSize(256, $address);
		$images['256x256x2'] = MakeSize(256, $address, 2);
		
		$images['512x512'] = MakeSize(512, $address);
		$images['512x512x2'] = MakeSize(512, $address, 2);
		
		$done = true;
	}
?>

<div class="card">


			<div class="well">
				<form action="" method="POST" style="margin: 0px;">
					<div class="input-group">
						<input type="text" class="form-control input-lg" name="address" value="<?=$headers->PostField('address');?>" placeholder="19540 Jamboree Road, Irvine, CA 92612">
						<span class="input-group-btn"  style="margin-top:16px; display:inline-block;">
							<input class="btn btn-success btn-lg" type="submit" value="Continue">
						</span>
					</div>
				</form>
			</div>

	
	<?php if($done == true) { ?>
		
		<p>Great. Below is all of the generated map images. Find the size you want, right click it, and choose "Save as..". Keep in mind that 2x scales are useful for mobile browsers as it will make the map show sharper.</p>
		
		<div class="row" style="margin-left: 0px; margin-top: 20px;">
			<div class="col-md-6">
				<div class="well">
					<b>256x256</b> with <b>Scale X1</b>
					
					<img src="<?=$images['256x256'];?>" alt="Error" style="margin-top: 15px;" width='256'>
				</div>
			</div>
			<div class="col-md-6">
				<div class="well">
					<b>256x256</b> with <b>Scale X2</b>
					
					<img src="<?=$images['256x256x2'];?>" alt="Error" style="margin-top: 15px;" width='256'>
				</div>
			</div>
		</div>
		<div class="row" style="margin-left: 0px; margin-top: 20px;">
			<div class="col-md-6">
				<div class="well">
					<b>512x512</b> with <b>Scale X1</b>
					
					<img src="<?=$images['512x512'];?>" alt="Error" style="margin-top: 15px;" width='256'>
				</div>
			</div>
			<div class="col-md-6">
				<div class="well">
					<b>512x512</b> with <b>Scale X2</b>
					
					<img src="<?=$images['512x512x2'];?>" alt="Error" style="margin-top: 15px;" width='256'>
				</div>
			</div>
		</div>
		
	<?php } ?>
</div>
	
