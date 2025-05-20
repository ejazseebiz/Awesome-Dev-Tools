



<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/bootstrap.min.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/bootstrap-theme.min.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/bulk_pagerank_checker.css" media="all" />

<link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/common.css" media="all"/></head>




		
		<div class="row">
			<div class="col-md-12">
				<p>Bulk PageRank Checker checks the PageRank of hundreds of domains or web pages, filters the domains in PageRank basis and sorts the domains in ascending or descending order using the PageRank. Check PageRank of a hundred domains or web pages and filter those domains in PageRank basis. Bulk PageRank Checker can also sort the domains in ascending or descending order using the PageRank.</p>
				<div class="well well-sm text-left">
					<form class="form-horizontal">
						<fieldset>

							<!-- Textarea -->
							<div class="form-group" style="padding-top:15px;">
								<label class="col-md-4 control-label" for="url">Web Page Url (100 max)</label>
								<div class="col-md-6">
									<textarea style="height:300px;" class="form-control" id="url" name="url"></textarea>
								</div>
							</div>

							<!-- Select Basic -->
							<div class="form-group">
								<label class="col-md-4 control-label" for="prselect">Only List PageRank Greater Than:</label>
								<div class="col-md-6">
									<select id="prselect" name="prselect" class="form-control">
										<option value="all">Show All</option>
										<option value="0">0</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
									</select>
								</div>
							</div>

							<!-- Multiple Radios -->
							<div class="form-group">
								<label class="col-md-4 control-label" for="order">Url List Order (Using PageRank)</label>
								<div class="col-md-4">
									<div class="radio">
										<label for="order-0">
											<input name="order" id="order-0" value="ascending" checked="checked" type="radio"> Ascending
										</label>
									</div>
									<div class="radio">
										<label for="order-1">
											<input name="order" id="order-1" value="descending" type="radio"> Descending
										</label>
									</div>
									<div class="radio">
										<label for="order-2">
											<input name="order" id="order-2" value="none" type="radio"> None
										</label>
									</div>
								</div>
							</div>

							<!-- Button -->
							<div class="form-group">
								<label class="col-md-4 control-label" for="getpr"></label>
								<div class="col-md-4">
									<button id="getpr" name="getpr" class="btn btn-primary">Get PageRank</button>
								</div>
							</div>

						</fieldset>
					</form>
				</div>
				<img src="img/loader.gif" alt="loading" class="l_img" />
				<table class="table table-striped table-hover text-left pr_tb">
					<thead>
						<tr>
							<th>URL</th>
							<th>PageRank</th>
						</tr>
					</thead>
					<tbody>

					</tbody>
				</table>
				<div class="trademark">* Google, PageRank and Google PageRank are registered trademarks of Google, Inc. BeautifyTools.com is not affiliated or endorsed by Google, Inc.</div>
			</div>
		</div>
       


<script src="<?php echo $plug_fl; ?>js/jquery.min.js"></script>
<script src="<?php echo $plug_fl; ?>js/bulk_pagerank_checker.js"></script>
<script src="<?php echo $plug_fl; ?>js/common.js"></script>

