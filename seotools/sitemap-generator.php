<?php
$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );

?>
<div class="card">
	<form action="<?php echo $plug_fl; ?>sitemap-generator-dl.php" method="POST">
		<input type="hidden" name="go" value="1">
		
		<div class="row" style="margin-left: 0px;">
			<div class="span9">
				<div class="tabbable">

				
					<div class="tab-content">
						<div class="tab-pane active" id="basic">
							<table class="table table-striped">
								<tbody>
									<tr>
										<td width="150px" class="valign-middle">Website URL</td>
										<td>
											<input type="text" name="url" placeholder="http://www.example.com/" class="form-control">
										</td>
									</tr>
									<tr>
										<td class="valign-middle">Update Frequency</td>
										<td>
											<select name="frequency" class="form-control">
												<option value="daily">Daily</option>
												<option value="weekly">Weekly</option>
												<option value="monthly">Monthly</option>
												<option value="yearly">Yearly</option>
											</select>
										</td>
									</tr>
									<tr>
										<td class="valign-middle">Website Priority</td>
										<td>
											<select name="priority" class="form-control">
												<option value="auto">Automatic</option>
												<option value="1">100%</option>
												<option value="0.75">75%</option>
												<option value="0.5">50%</option>
												<option value="0.25">25%</option>
											</select>
										</td>
									</tr>
				
									
									<tr>
										<td width="150px" class="valign-middle">Crawl Speed</td>
										<td>
											<select name="speed" class="form-control">
												<option value="0">Fast</option>
												<option value="1">Medium</option>
												<option value="2">Slow</option>
											</select>
										</td>
									</tr>
									<tr>
										<td class="valign-middle">File Name</td>
										<td>
											<input type="text" name="fname" value="sitemap.xml" class="form-control">
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="form-actions"style="margin-top: 16px;">
					<div class="span4">
						<button type="submit" class="btn btn-primary" onclick="$(this).hide(); $('#loading').show();">Generate & Download</button>
                        <div id="loading" style="display: none;">Generating, please wait...</div>
					</div>
					<div class="span5">
						<div id="pb" style="display: none; margin-top: 4px;">
							<div class="progress progress-striped active" style="margin-top: 0px; margin-bottom: 0px;">
								<div class="bar" style="width: 100%;"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	
	</form>
</div>
	
<style>
	input, select { margin: 6px 0px !important; }
	.valign-middle { vertical-align: middle !important; padding-left: 15px !important; }
</style>

