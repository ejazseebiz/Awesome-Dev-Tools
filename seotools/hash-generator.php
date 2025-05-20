	<?php
$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );
include("functions.php");

?>

<link rel="stylesheet" type="text/css" href="<?php echo $plug_dr; ?>css/bootstrap.min.css" media="all" />

<?php
	$title = "Hash Generator - Security";
	
	$done = false;
	$result = "Please press the button to generate a hash.";
	
	if(isset($_POST['go'])) {
		$text = $_POST['text'];
		$method = $_POST['method']; // md5, sha1, or crypt
		
		if($method == 'md5') $result = md5($text);
		if($method == 'sha1') $result = sha1($text);
		if($method == 'crypt') $result = crypt($text);
	}
?>

<div class="card">

	
	<form action="" method="POST">
		<input type="hidden" name="go" value="1">
	
		<div class="row">
			<div class="col-md-7">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Setting</th>
							<th>Value</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="valign-middle">Text</td>
							<td>
								<input class="form-control" type="text" name="text" value="<?=$headers->PostField('text');?>" placeholder="I will soon be turned into some non-human-readable code." style="width: 400px;">
							</td>
						</tr>
						<tr>
							<td class="valign-middle">Method</td>
							<td>
								<select name="method" class="form-control">
									<option value="md5">MD5</option>
									<option value="sha1">SHA-1</option>
									<option value="crypt">CRYPT</option>
								</select>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="col-md-5">
				<div class="well">
					<button class="btn btn-large btn-block btn-success" type="submit">Generate Hash</button>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-12">
				<div class="well">
					<h3 style="margin: 0px 0px 15px 0px;">Generated Hash</h3>
					
					<pre><?=$result;?></pre>
				</div>
			</div>
		</div>
	

</form>
		</div>
	
