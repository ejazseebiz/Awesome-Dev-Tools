<?php
// autoload.php
require_once __DIR__ . '/src/Carbon/Traits/IntervalStep.php';
require_once __DIR__ . '/src/Carbon/Traits/Week.php';
require_once __DIR__ . '/src/Carbon/Traits/Units.php';
require_once __DIR__ . '/src/Carbon/Traits/Timestamp.php';
require_once __DIR__ . '/src/Carbon/Traits/Test.php';
require_once __DIR__ . '/src/Carbon/Traits/ObjectInitialisation.php';
require_once __DIR__ . '/src/Carbon/Traits/Serialization.php';
require_once __DIR__ . '/src/Carbon/Traits/IntervalRounding.php';
require_once __DIR__ . '/src/Carbon/Traits/Rounding.php';
require_once __DIR__ . '/src/Carbon/Traits/Localization.php';
require_once __DIR__ . '/src/Carbon/Traits/Options.php';
require_once __DIR__ . '/src/Carbon/Traits/Cast.php';
require_once __DIR__ . '/src/Carbon/Traits/Mutability.php';
require_once __DIR__ . '/src/Carbon/Traits/Modifiers.php';
require_once __DIR__ . '/src/Carbon/Traits/MagicParameter.php';
require_once __DIR__ . '/src/Carbon/Traits/Mixin.php';
require_once __DIR__ . '/src/Carbon/Traits/Macro.php';
require_once __DIR__ . '/src/Carbon/Traits/Difference.php';
require_once __DIR__ . '/src/Carbon/Traits/ObjectInitialisation.php';
require_once __DIR__ . '/src/Carbon/Traits/Creator.php';
require_once __DIR__ . '/src/Carbon/Traits/ToStringFormat.php';
require_once __DIR__ . '/src/Carbon/Traits/Converter.php';
require_once __DIR__ . '/src/Carbon/Traits/Comparison.php';
require_once __DIR__ . '/src/Carbon/Traits/Boundaries.php';
require_once __DIR__ . '/src/Carbon/Traits/Date.php';


require_once __DIR__ . '/src/Carbon/CarbonTimeZone.php';
require_once __DIR__ . '/src/Carbon/CarbonInterface.php';
// require_once __DIR__ . '/src/Carbon/Carbon.php';
require_once __DIR__ . '/src/Carbon/CarbonConverterInterface.php';
require_once __DIR__ . '/src/Carbon/CarbonInterval.php';



require_once __DIR__ . '/src/Carbon/Carbon.php'; // Adjust the path if needed
use Carbon\Carbon;
use Carbon\CarbonInterval;
// use Carbon\CarbonConverterInterface;

// spl_autoload_register(function ($class) {
//     // Define the base directory for the namespace prefix
//     $baseDir = __DIR__ . 'src/Carbon/';

//     // Define the namespace prefix
//     $prefix = 'Carbon\\';

//     // Does the class use the namespace prefix?
//     $len = strlen($prefix);
//     if (strncmp($prefix, $class, $len) !== 0) {
//         // No, move to the next registered autoloader
//         return;
//     }

//     // Get the relative class name
//     $relativeClass = substr($class, $len);

//     // Replace the namespace prefix with the base directory,
//     // replace namespace separators with directory separators,
//     // and add .php at the end
//     $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';

//     // If the file exists, require it
//     if (file_exists($file)) {
//         require $file;
//     }
// });