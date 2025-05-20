<?php
$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );
?>


		<div class="card">
		
			<div style="overflow:scroll">
				<table width="100%" class="table table-striped">
					<thead>
						<tr>
							<th>
								Item
							</th>
							<th>
								Content
							</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>HTTP_USER_AGENT</td>
							<td><?=$_SERVER["HTTP_USER_AGENT"];?></td>
						</tr>
						<tr>
							<td>HTTP_CONNECTION</td>
							<td><?=$_SERVER["HTTP_CONNECTION"];?></td>
						</tr>
						<tr>
							<td>REMOTE_PORT</td>
							<td><?=$_SERVER["REMOTE_PORT"];?></td>
						</tr>
						<tr>
							<td>REMOTE_ADDR</td>
							<td><?=$_SERVER["REMOTE_ADDR"];?></td>
						</tr>
						<tr>
							<td>HTTP_ACCEPT</td>
							<td><?=$_SERVER["HTTP_ACCEPT"];?></td>
						</tr>
						<tr>
							<td>HTTP_ACCEPT_LANGUAGE</td>
							<td><?=$_SERVER["HTTP_ACCEPT_LANGUAGE"];?></td>
						</tr>
						<tr>
							<td>REQUEST_METHOD</td>
							<td><?=$_SERVER["REQUEST_METHOD"];?></td>
						</tr>
						<tr>
							<td>REQUEST_TIME</td>
							<td><?=$_SERVER["REQUEST_TIME"];?></td>
						</tr>
					</tbody>
				</table>
</div>

		</div>