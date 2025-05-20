
<?php
$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );
?>
<link rel="stylesheet" href="<?php echo $plug_fl; ?>/parallax.css" />
<link rel="stylesheet" href="<?php echo $plug_fl; ?>/letterbox.css"/>
<link rel="stylesheet" href="<?php echo $plug_fl; ?>/letterplane.css"/>
<link rel="stylesheet" href="<?php echo $plug_fl; ?>/gun.css"/>
<link rel="stylesheet" href="<?php echo $plug_fl; ?>/controls.css"/>
<script src="<?php echo $plug_fl; ?>/parallax.js"></script>
<script src="<?php echo $plug_fl; ?>/letterbox.js"></script>
<script src="<?php echo $plug_fl; ?>/letterplane.js"></script>
<script src="<?php echo $plug_fl; ?>/gun.js"></script>
<script src="<?php echo $plug_fl; ?>/controls.js"></script>

<body>
<div id="background">
  <canvas id="stars"></canvas>
  <div id="letterplane"></div>
  <img id="gun" src="<?php echo $plug_fl; ?>/gun.png"/>
  <img id="lightning" src="<?php echo $plug_fl; ?>/lightning.png"/>
  <div id="title"><div id="name">ALPHABLASTER</div><div id="info">Level <span id="level">1</span>. Spacebar to begin</div></div>
</div>

</body>
