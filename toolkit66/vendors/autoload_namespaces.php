<?php
// $vendorDir = dirname(__DIR__);
// $baseDir = dirname($vendorDir);

// return array(
//     'Unirest\\' =>  './mashape/unirest-php/src/Unirest.php',
//     'ChrisKonnertz\\BBCode' => '/chriskonnertz/bbcode/src',
// );

declare(strict_types = 1);
\spl_autoload_register(function (string $class) : void {
	
		require(__DIR__.'/mashape/unirest-php/src/Unirest.php');
	
});
