<?php
$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );
?>

<link rel="stylesheet" type="text/css" href="<?php echo $plug_dr; ?>css/bootstrap.min.css" media="all" />
<?php
function alexaRank($url) {
 $alexaData = simplexml_load_file("http://data.alexa.com/data?cli=10&url=".$url);
 $alexa['globalRank'] =  isset($alexaData->SD->POPULARITY) ? $alexaData->SD->POPULARITY->attributes()->TEXT : 0 ;
 $alexa['CountryRank'] =  isset($alexaData->SD->COUNTRY) ? $alexaData->SD->COUNTRY->attributes() : 0 ;
 return json_decode(json_encode($alexa), TRUE);
}
?>

<div class="card">

    <!-- container -->
    <div class="container">

<form method="get" action="">
    <div>
        <p>Enter your domain name.</p>
        <p><input name="siteinfo" style="width:350px;" placeholder="E.g. gudanglink.com" required="required" class="form-control" /></p>
        <p><input type="submit" value="Get Alexa Rank" id="qr-gn"></p>
    </div>
</form>
<br />
<?php
if(isset($_REQUEST['siteinfo'])) {
 	$url = $_REQUEST['siteinfo'];
    $alexa = alexaRank($url);
    $globalRank = isset($alexa['globalRank'][0]) ? $alexa['globalRank'][0] : 'N/A';
    $countryRank = isset($alexa['CountryRank']['@attributes']['RANK']) ? $alexa['CountryRank']['@attributes']['RANK'] : 'N/A';
    echo "<h1>".$url." global alexa rank is <b style='color:red'>".$globalRank."</b> And Country (".$alexa['CountryRank']['@attributes']['NAME'].") rank is <b style='color:red'>".$countryRank."</b></h3>";
 }
 ?>
</div>
</div>