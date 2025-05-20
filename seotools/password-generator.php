	<?php
$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );

?>

<link rel="stylesheet" type="text/css" href="<?php echo $plug_dr; ?>css/bootstrap.min.css" media="all" />


<?php
	$title = "Password Generator - Security";
	
	$done = false;
	$passwords = array();
	
	if(isset($_POST['go'])) {
		$length = $_POST['length'];
		$letters = $_POST['letters'];
		$numbers = $_POST['numbers'];
		$symbols = $_POST['symbols'];
		$amount = $_POST['amount'];
		
		$lettersarr = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
		$numbersarr = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
		$symbolsarr = array('!', '@', '#', '%', '^', '&', '$', '*', '(', ')', ':', ';', '.', ',', '[', ']', '{', '}', '/');
		
		$chars = array();
		if($letters == 'On') $chars = array_merge($chars, $lettersarr);
		if($numbers == 'On') $chars = array_merge($chars, $numbersarr);
		if($symbols == 'On') $chars = array_merge($chars, $symbolsarr);
		
		
		for($x = 1; $x <= $amount; $x++) {
			$hash = "";
			$length2 = $length;
			if($length2 === '') $length2 = rand(6, 25);
			for($y = 1; $y <= $length2; $y++) {
				$hash .= $chars[rand(0, (count($chars)-1))];
			}
			$passwords[] = $hash;
		}
		
		$done = true;
	}
?>



	
	<?php if($done === false) { ?>
		<div class="card">
	<form action="" method="POST">
		<input type="hidden" name="go" value="1">
	
		<div class="row" style="margin-left: 0px;">
			<div class="col-md-12">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Setting</th>
							<th>Value</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="valign-middle">Length</td>
							<td>
								<select name="length">
									<option value="">Random</option>
									<option value="6">6</option> <option value="7">7</option>
									<option value="8">8</option> <option value="9">9</option>
									<option value="10">10</option> <option value="11">11</option>
									<option value="12">12</option> <option value="13">13</option>
									<option value="14">14</option> <option value="15">15</option>
									<option value="16">16</option> <option value="17">17</option>
									<option value="18">18</option> <option value="19">19</option>
									<option value="20">20</option> <option value="21">21</option>
									<option value="22">22</option> <option value="23">23</option>
									<option value="24">24</option> <option value="25">25</option>
								</select>
							</td>
						</tr>
						<tr>
							<td class="valign-middle">Use Letters</td>
							<td>
								<select name="letters">
									<option value="On">Enabled</option>
									<option value="Off">Disabled</option>
								</select>
							</td>
						</tr>
						<tr>
							<td class="valign-middle">Use Numbers</td>
							<td>
								<select name="numbers">
									<option value="On">Enabled</option>
									<option value="Off">Disabled</option>
								</select>
							</td>
						</tr>
						<tr>
							<td class="valign-middle">Use Symbols</td>
							<td>
								<select name="symbols">
									<option value="On">Enabled</option>
									<option value="Off">Disabled</option>
								</select>
							</td>
						</tr>
						<tr>
							<td class="valign-middle">Amount to Generate</td>
							<td>
								<select name="amount">
									<option value="1">1</option>
									<option value="5">5</option>
									<option value="10">10</option>
									<option value="25">25</option>
									<option value="50">50</option>
									<option value="100">100</option>
								</select>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="col-md-12">
				<div class="well">
					<button class="btn btn-large btn-block btn-success" type="submit">Generate Password</button>
					<div class="clearfix"></div>
				</div>
				<div class="well">
					<p>When you are ready, click the button above to generate your passwords. Note that generation can take some time depending on the number you chose to generate, and their compelexity.</p>
				</div>
			</div>
		</div>
		
	</form>
	</div>
	<?php } else { ?>
	
		<div class="card">
			<div class="col-md-12">
				<div class="well">					
					<pre><?php
							foreach($passwords as $pass) {
								echo $pass . PHP_EOL;
							}
					?></pre>
				</div>
			</div>
			
			<div class="col-md-12">
				<div class="well">
					<button class="btn btn-large btn-block btn-info" type="button" onclick="location.reload();">Regenerate Passwords</button>
					<div class="clearfix"></div>
				</div>
				<div class="well">
					<p>Need more? Press the button above to reload the page. Press OK to any dialogs that pop up.</p>
				</div>
			</div>
		</div>
	
	<?php } ?>

