<?php
/********* HEX to RGB Convert *********/
function hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
	   $rgb = array ('r' => hexdec(substr($hex,0,1).substr($hex,0,1)),
					 'g' => hexdec(substr($hex,1,1).substr($hex,1,1)),
					 'b' => hexdec(substr($hex,2,1).substr($hex,2,1)));
   
   } else {
	   $rgb = array ( 'r' => hexdec(substr($hex,0,2)),
	   				  'g' => hexdec(substr($hex,2,2)),
					  'b' => hexdec(substr($hex,4,2)));
   }
   //return implode(",", $rgb); // returns the rgb values separated by commas
   return $rgb; // returns an array with the rgb values
}


//$rgb = hex2rgb($col);
//echo "<br>RGB: ";
//print_r($rgb);
//echo $rgb['r'];
/********* HEX to RGB Convert *********/



/********* RGB to CMYK Convert *********/

function rgb2cmyk($var1,$g=0,$b=0) {
   if (is_array($var1)) {
      $r = $var1['r'];
      $g = $var1['g'];
      $b = $var1['b'];
   } else {
      $r=$var1;
   }
   $cyan    = 255 - $r;
   $magenta = 255 - $g;
   $yellow  = 255 - $b;
   $black  = min($cyan, $magenta, $yellow);
   $cyan    = @(($cyan    - $black) / (255 - $black)) * 255;
   $magenta = @(($magenta - $black) / (255 - $black)) * 255;
   $yellow  = @(($yellow  - $black) / (255 - $black)) * 255;
   return array('c' => $cyan / 255,
                'm' => $magenta / 255,
                'y' => $yellow / 255,
                'k' => $black / 255);
}


//$cmyk=rgb2cmyk(hex2rgb($col));
//echo "<br>CMYK: ";	
//print_r($cmyk);
//print_r($cmyk['k']);
/********* RGB to CMYK Convert *********/



/********* RGB to HSL Convert *********/
function rgb2hsl($rgb){
    $clrR = ($rgb['r']);
    $clrG = ($rgb['g']);
    $clrB = ($rgb['b']);
     
    $clrMin = min($clrR, $clrG, $clrB);
    $clrMax = max($clrR, $clrG, $clrB);
    $deltaMax = $clrMax - $clrMin;
     
    $L = ($clrMax + $clrMin) / 510;
     
    if (0 == $deltaMax){
        $H = 0;
        $S = 0;
    }
    else{
        if (0.5 > $L){
            $S = $deltaMax / ($clrMax + $clrMin);
        }
        else{
            $S = $deltaMax / (510 - $clrMax - $clrMin);
        }

        if ($clrMax == $clrR) {
            $H = ($clrG - $clrB) / (6.0 * $deltaMax);
        }
        else if ($clrMax == $clrG) {
            $H = 1/3 + ($clrB - $clrR) / (6.0 * $deltaMax);
        }
        else {
            $H = 2 / 3 + ($clrR - $clrG) / (6.0 * $deltaMax);
        }

        if (0 > $H) $H += 1;
        if (1 < $H) $H -= 1;
    }
    return array($H, $S,$L);
}


//$hsl2 = rgb2hsl(hex2rgb($col));
//echo "<br>HSL: ";
//print_r($hsl2);


/********* RGB to HSL Convert *********/

function RGBtoHSV($rgb)    // RGB values:    0-255, 0-255, 0-255
{                                // HSV values:    0-360, 0-100, 0-100
    // Convert the RGB byte-values to percentages
    $R = ($rgb['r']);
    $G = ($rgb['g']);
    $B = ($rgb['b']);
	
    $R = ($R / 255);
    $G = ($G / 255);
    $B = ($B / 255);

    $maxRGB = max($R, $G, $B);
    $minRGB = min($R, $G, $B);
    $chroma = $maxRGB - $minRGB;

    $computedV = 100 * $maxRGB;

    if ($chroma == 0)
        return array(0, 0, $computedV);

    $computedS = 100 * ($chroma / $maxRGB);

    if ($R == $minRGB)
        $h = 3 - (($G - $B) / $chroma);
    elseif ($B == $minRGB)
        $h = 1 - (($R - $G) / $chroma);
    else // $G == $minRGB
        $h = 5 - (($B - $R) / $chroma);

    $computedH = 60 * $h;

    return array($computedH, $computedS, $computedV);
}
//$hsv = RGBtoHSV(hex2rgb($col));
//echo "<br>HSV: ";
//print_r($hsv);


?>



<?php
function colourBrightness($hex, $percent) {
	// Work out if hash given
	$hash = '';
	if (stristr($hex,'#')) {
		$hex = str_replace('#','',$hex);
		$hash = '#';
	}
	/// HEX TO RGB
	$rgb = array(hexdec(substr($hex,0,2)), hexdec(substr($hex,2,2)), hexdec(substr($hex,4,2)));
	//// CALCULATE 
	for ($i=0; $i<3; $i++) {
		// See if brighter or darker
		if ($percent > 0) {
			// Lighter
			$rgb[$i] = round($rgb[$i] * $percent) + round(255 * (1-$percent));
		} else {
			// Darker
			$positivePercent = $percent - ($percent*2);
			$rgb[$i] = round($rgb[$i] * $positivePercent) + round(0 * (1-$positivePercent));
		}
		// In case rounding up causes us to go to 256
		if ($rgb[$i] > 255) {
			$rgb[$i] = 255;
		}
	}
	//// RBG to Hex
	$hex = '';
	for($i=0; $i < 3; $i++) {
		// Convert the decimal digit to hex
		$hexDigit = dechex($rgb[$i]);
		// Add a leading zero if necessary
		if(strlen($hexDigit) == 1) {
		$hexDigit = "0" . $hexDigit;
		}
		// Append to the hex string
		$hex .= $hexDigit;
	}
	return $hash.$hex;
}

/*
$colour = '#2ea331';
$brightness = 0.5; // 50% brighter
$newColour = colourBrightness($colour,$brightness);
*/

?>