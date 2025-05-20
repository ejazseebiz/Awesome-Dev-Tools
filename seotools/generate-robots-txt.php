<?php
$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );
?>

<link rel="stylesheet" type="text/css" href="<?php echo $plug_dr; ?>css/bootstrap.min.css" media="all" />
<?php
	if (!isset($_POST["doFormPostback"])) {
?>
<div class="card">
<div class="container">
    <form action="" method="POST">
        <input type="hidden" name="doFormPostback" value="abc">

        <div class="row">
            <div class="span8">
                <p style="margin-bottom: 50px;">
                    <?php
							$str = "Deselect any of the following search engines if you do not want them to crawl your website.";

							echo $str;
						?>
                </p>

                <div class="row" style="margin-bottom: 25px;">
                    <div class="col-md-3 col-lg-3 col-sm-3">
                        <center>
                            <label for="cb1">Googlebot</label>
                            <div class="switch">
                                <input id="cb1" type="checkbox" checked name="Googlebot" />
                            </div>
                        </center>
                    </div>
                    <div class="col-md-3 col-lg-3 col-sm-3">
                        <center>
                            <label for="cb2">Google Image</label>
                            <div class="switch">
                                <input id="cb2" type="checkbox" checked name="Googlebot-Image" />
                            </div>
                        </center>
                    </div>
                    <div class="col-md-3 col-lg-3 col-sm-3">
                        <center>
                            <label for="cb3">Google Mobile</label>
                            <div class="switch">
                                <input id="cb3" type="checkbox" checked name="Googlebot-Mobile" />
                            </div>
                        </center>
                    </div>
                    <div class="col-md-3 col-lg-3 col-sm-3">
                        <center>
                            <label for="cb4">MSNBot</label>
                            <div class="switch">
                                <input id="cb4" type="checkbox" checked name="MSNBot" />
                            </div>
                        </center>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 25px;">
                    <div class="col-md-3 col-lg-3 col-sm-3">
                        <center>
                            <label for="cb5">PSBot</label>
                            <div class="switch">
                                <input id="cb5" type="checkbox" checked name="PSBot" />
                            </div>
                        </center>
                    </div>
                    <div class="col-md-3 col-lg-3 col-sm-3">
                        <center>
                            <label for="cb6">Slurp</label>
                            <div class="switch">
                                <input id="cb6" type="checkbox" checked name="Slurp" />
                            </div>
                        </center>
                    </div>
                    <div class="col-md-3 col-lg-3 col-sm-3">
                        <center>
                            <label for="cb7">Yahoo MM</label>
                            <div class="switch">
                                <input id="cb7" type="checkbox" checked name="Yahoo-MMCrawler" />
                            </div>
                        </center>
                    </div>
                    <div class="col-md-3 col-lg-3 col-sm-3">
                        <center>
                            <label for="cb8">Yahoo Blogs</label>
                            <div class="switch">
                                <input id="cb8" type="checkbox" checked name="yahoo-blogs/v3.9" />
                            </div>
                        </center>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 25px;">
                    <div class="col-md-3 col-lg-3 col-sm-3">
                        <center>
                            <label for="cb9">Teoma</label>
                            <div class="switch">
                                <input id="cb9" type="checkbox" checked name="teoma" />
                            </div>
                        </center>
                    </div>
                    <div class="col-md-3 col-lg-3 col-sm-3">
                        <center>
                            <label for="cb10">Scrubby</label>
                            <div class="switch">
                                <input id="cb10" type="checkbox" checked name="Scrubby" />
                            </div>
                        </center>
                    </div>
                    <div class="col-md-3 col-lg-3 col-sm-3">
                        <center>
                            <label for="cb11">IA Archiver</label>
                            <div class="switch">
                                <input id="cb11" type="checkbox" checked name="ia_archiver" />
                            </div>
                        </center>
                    </div>
                </div>

            </div>
        </div>

        <hr />
        <button type="submit" class="btn btn-success btn-lg">Continue</button>
    </form>
</div>
    </div>
<?php
	} else {
?>
<?php
	$code = '';

		$engines = array(
			'Googlebot',
			'Googlebot-Image',
			'Googlebot-Mobile',
			'MSNBot',
			'PSBot',
			'Slurp',
			'Yahoo-MMCrawler',
			'yahoo-blogs/v3_9',
			'teoma',
			'Scrubby',
			'ia_archiver'
		);
		
		foreach($engines as $i) {
			$code .= 'User-agent: ' . $i . PHP_EOL;
			
			$code .= 'Disallow: ';
			if(!isset($_POST[$i])) $code .= "/";
			$code .= PHP_EOL . PHP_EOL;
		}
	
?>
<div class="card">
<div class="well">
    <pre><?=$code;?></pre>
</div>
    </div>
<?php
}
?>
