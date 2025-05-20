<?php
declare(strict_types = 1);
\spl_autoload_register(function (string $class) : void {

	require_once( __DIR__.'/Helpers/DefinedColor.php');
	require_once( __DIR__.'/Traits/RgbTrait.php');
	require_once( __DIR__.'/Traits/AlphaTrait.php');
	require_once( __DIR__.'/Traits/HsTrait.php');
	require_once( __DIR__.'/Traits/HslTrait.php');
	require_once(__DIR__.'/BaseColor.php');
	require_once(__DIR__.'/Color/Hexa.php');
	require_once(__DIR__.'/Color/Hex.php');
	require_once(__DIR__.'/Color/Rgb.php');
	require_once(__DIR__.'/Color/Rgba.php');
	require_once(__DIR__.'/Color/Hsv.php');
	require_once(__DIR__.'/Color/Hsl.php');
	require_once(__DIR__.'/Color/Hsla.php');
	
});
