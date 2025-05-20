<?php 
	include("template-header.php"); 
	include("colorfunctions.php"); 
?>




<div class="colordata">

<h2>#<?php echo $col; ?> Hex Color</h2>
<?php    
$rgb = hex2rgb($col);
$cmyk=rgb2cmyk(hex2rgb($col));
$hsl = rgb2hsl(hex2rgb($col));
$hsv = RGBtoHSV(hex2rgb($col));
?>
<div class="row">
<div class="col-md-6">
<div style="margin-bottom:15px; width:100%; height:200px; background:#<?php echo $col; ?>; border:solid 5px #999;"></div>
</div>
<div class="col-md-6">
<table class="table">
	<tr><th>RGB</th><td><?php echo $rgb['r']; ?></td><td><?php echo $rgb['g']; ?></td><td><?php echo $rgb['b']; ?></td><td></td></tr>
    <tr><th>HSL</th><td><?php echo round($hsl['0'],2); ?></td><td><?php echo round($hsl['1'],2); ?></td><td><?php echo round($hsl['2'],2); ?></td><td></td></tr>
    <tr><th>HSV</th><td><?php echo round($hsv['0'],2); ?></td><td><?php echo round($hsv['1'],2); ?></td><td><?php echo round($hsv['2'],2); ?></td><td></td></tr>
    <tr><th>CMYK</th><td><?php echo round($cmyk['c'],2); ?></td><td><?php echo round($cmyk['m'],2); ?></td><td><?php echo round($cmyk['y'],2); ?></td><td><?php echo round($cmyk['k'],2); ?></td></tr>
</table>
</div>
</div>
<div class="clearfix"></div>
<div class="colorshades">
    <h3> Shades of <?php echo $col; ?> color</h3>
    <div class="row">
<?php
$colour = $col;
for ($i=0; $i<12; $i++) {
$br=-$i/11;
$newColour = colourBrightness($colour,$br);
?>

<div class="col-md-1 color-shade">
<form id="frm<?php echo $br; ?>" action="" method="post">
<input type="hidden" name="picker" value="<?php echo $newColour; ?>">
<button type="submit" class="btn-default btn-block btn-color" style="background:#<?php echo $newColour; ?>;">&nbsp;</button>
<div>#<?php echo $newColour; ?></div>
</form>
</div>

<?php
}
?>
</div>
</div>
<div class="colorshades">
    <h3> Tint of <?php echo $col; ?> color</h3>
    <div class="row">
<?php
$colour = $col;
for ($i=0; $i<12; $i++) {
$br=$i/11;
$newColour = colourBrightness($colour,$br);
if ($br==0){
	$newColour = "ffffff";
}
?>

<div class="col-md-1 color-shade">
<form id="frm<?php echo $br; ?>" action="" method="post">
<input type="hidden" name="picker" value="<?php echo $newColour; ?>">
<button type="submit" class="btn-default btn-block btn-color" style="background:#<?php echo $newColour; ?>;">&nbsp;</button>
<div>#<?php echo $newColour; ?></div>
</form>
</div>


<?php
}
?>
</div>
<div class="clearfix"></div>
</div>
    <div class="colorexmples">
    <div class="bgpreview row">
    <div class="col-md-6"><h4>#<?php echo $col; ?> Color Preview on Black Background</h4><div class="bgpbox" style="background:#000; color:#<?php echo $col; ?>"><span class="bgpboxin" style="background:#<?php echo $col; ?>"></span><b><br>Lorem ipsum dolor sit amet.</b></div></div>
    <div class="col-md-6"><h4>#<?php echo $col; ?> Color Preview on Black Background</h4><div class="bgpbox" style="background:#fff; color:#<?php echo $col; ?>"><span class="bgpboxin" style="background:#<?php echo $col; ?>"></span><b><br>Lorem ipsum dolor sit amet.</b></div></div>
        
    </div>
    <div class="row">
<div class="col-md-6">
    <h4>#<?php echo $col; ?> Color CSS Codes</h4>
<pre>
.mybgcolor {background-color:#<?php echo $col; ?>; } 
.myforecolor {color:#<?php echo $col; ?>; }
.mybordercolor {border:3px solid #<?php echo $col; ?>; }
</pre>
    
    
    <h4><?php echo $col; ?> Text Font Color</h4>

    <pre>&lt;p style="color:#<?php echo $col; ?>"&gt;Text here&lt;/p&gt;</pre>
    <p style="color:#<?php echo $col; ?>"> This sample text font color is #<?php echo $col; ?> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

    <h4><?php echo $col; ?> Background Color</h4>
<pre>&lt;div style="background-color:#<?php echo $col; ?>"&gt; Div content here&lt;/div&gt;</pre>
    
    <div style="background-color:#<?php echo $col; ?>; color:#fff; padding:20px 0; text-align:center;"> This div background color is #<?php echo $col; ?></div>

 <h4><?php echo $col; ?> Border Color</h4>
<pre>&lt;div style="border:3px solid #<?php echo $col; ?>"&gt; Div content here&lt;/div&gt;</pre>
    
    <div style="border:3px solid #<?php echo $col; ?>; padding:20px 0; text-align:center;"> This div background color is #<?php echo $col; ?></div>
    
    </div>

        <div class="col-md-6">
            <h4>Css3 Examples</h4>
            <pre>
.textShadowRgb {
  text-shadow: 4px 4px 2px rgba(<?php echo $rgb['r']; ?>,<?php echo $rgb['g']; ?>,<?php echo $rgb['b']; ?>, 0.8); } 
.textShadowHex { 
  text-shadow: 4px 4px 2px #<?php echo $col; ?>; }
.divShadow { 
  -moz-box-shadow: 1px 1px 3px 2px #<?php echo $col; ?>;
  -webkit-box-shadow: 1px 1px 3px 2px #<?php echo $col; ?>;
  box-shadow:         1px 1px 3px 2px #<?php echo $col; ?>; }
</pre>



            <h4>Text Shadow with RGB Values</h4>
<pre>&lt;p style="text-shadow: 4px 4px 2px rgba(<?php echo $rgb['r']; ?>,<?php echo $rgb['g']; ?>,<?php echo $rgb['b']; ?>, 0.8);"&gt;Text here&lt;/p&gt;</pre>
            
            
            
<p style="text-shadow: 4px 4px 2px rgba(<?php echo $rgb['r']; ?>,<?php echo $rgb['g']; ?>,<?php echo $rgb['b']; ?>, 0.8);">This text has shadow with rgb values.</p>


            <h4>Text Shadow with Hex Values</h4>
<pre>&lt;p style="text-shadow: 4px 4px 2px #<?php echo $col; ?>"&gt;Text here&lt;/p&gt;</pre>
            <p style="text-shadow: 4px 4px 2px #<?php echo $col; ?>">This text has shadow with hex values.</p>


<h4>Div Box Shadow</h4>
<pre>
&lt;div style="-moz-box-shadow: 1px 1px 3px 2px #<?php echo $col; ?>;
  -webkit-box-shadow: 1px 1px 3px 2px #<?php echo $col; ?>;
  box-shadow:         1px 1px 3px 2px #<?php echo $col; ?>;"&gt;
Div content here&lt;/div&gt;</pre>

<div style="-moz-box-shadow: 1px 1px 3px 2px #<?php echo $col; ?>;
  -webkit-box-shadow: 1px 1px 3px 2px #<?php echo $col; ?>;
  box-shadow: 1px 1px 3px 2px #<?php echo $col; ?>; padding:20px 0; text-align:center;">
This div box has shadow with color #<?php echo $col; ?>
            </div>
        </div>
        
        
    </div>
</div>
</div>


<script src="<?php echo $plug_fl; ?>js/colpick.js"></script>
<script src="<?php echo $plug_fl; ?>js/custom.js"></script>
<script>
	picker("<?php echo $col; ?>");
</script>