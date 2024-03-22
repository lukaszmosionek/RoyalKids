<?php


// OKRESLENIE POLOZENIA STRONY W SERWISIE - DEFINICJA <BASE ... />
$AbsoluteURL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://';
$dirCat = dirname($_SERVER['PHP_SELF']);
$AbsoluteURL .= $_SERVER['HTTP_HOST'];
$AbsoluteURL .= $dirCat != '\\' ? $dirCat : "";
$slash = substr($AbsoluteURL, -1);

$NewURL = $slash != '/' ? $AbsoluteURL.'/' : $AbsoluteURL;
date_default_timezone_set('Europe/Warsaw');
	
error_reporting(E_ALL & ~E_NOTICE);



define('KB', 1024);
define('MB', 1048576);
define('GB', 1073741824);
define('TB', 1099511627776);
	
	
// STALE DLA FACEBOOKA
define('FB_ID', '417534198442015');
define('FB_SECRET', '145b89c1577b77b1c18487361d23ccba');

// STALE DLA BAZY DANYCH
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'marian82_user');
define('DB_PW', 'lIHebI1Y');
define('DB_DB', 'marian82_obr');

// STALA DLA ADRESU I LOKALIZACJI APLIKACJI
define('SERVER_ADDRESS', $NewURL);

// STALA DLA LOKALIZACJI KATALOGÓW I PLIKÓW
define('LogFolder', 'LOG', true);


set_include_path(get_include_path(). PATH_SEPARATOR . $_SERVER['DOCUMENT_ROOT'] ."/LIB");


require 'function.php';


// Magiczna funkcja automatycznie ladujaca klasy wg. zapotrzebowania
//require_once __DIR__ ."/func/main.func.php";
function __autoload_libraries($className) {    
    @include_once($className.".class.php");   
}
spl_autoload_register('__autoload_libraries');
?>
