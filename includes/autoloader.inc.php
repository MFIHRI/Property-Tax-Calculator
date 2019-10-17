<?php
spl_autoload_register('calcAutoloader');
function calcAutoLoader($className) {
// make sure the path to classes dir is accessible at all times
$url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
if (strpos($url, 'includes') !==false) {
$path = "../classes/";
}
else {
$path = "classes/";
}
$extension = ".class.php";
$fullPath = $path . $className . $extension;

if(!file_exists($fullPath)){
return false;
} 
else {
include_once $fullPath;
}

}
?>                                     