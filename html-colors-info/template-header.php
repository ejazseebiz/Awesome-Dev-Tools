<?php
$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );
?>
  <link href="<?php echo $plug_fl; ?>css/colpick.css" rel="stylesheet" type="text/css">
  <link href="<?php echo $plug_fl; ?>css/styles.css" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="<?php echo $plug_dr; ?>js/jquery.js"></script>


<?php 
if(empty($_POST["picker"])){
	$col = "ff0000";
	}
	else{
	$col = $_POST["picker"];
	}
?>


<?php
    $currentFile = basename($_SERVER["PHP_SELF"]);
    $parts = Explode('.', $currentFile);
    $fname = $parts[count($parts) - 2];
?>


<div class="container">
<form action="" id="colorinfo" method="post">
    <div class="row">
        <div class="col-md-4">
            <input type="text" id="picker" name="picker" value="<?php echo $col; ?>" class="form-control"></input>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-default">Get Info</button>
            <div id="errMess" class="small"></div>
        </div>
        <div class="col-md-3 text-right" style="display:none;">
            <a href="palette-add.php" class="btn btn-primary">Add Palettes</a> <a href="palettes.php" class="btn btn-success">Show Palettes</a>
        </div>
    </div>
</form>

</div>
