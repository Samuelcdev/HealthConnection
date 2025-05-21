<?php
$folderPath = dirname($_SERVER['SCRIPT_NAME']);
$urlPath = $_SERVER['REQUEST_URI'];
$url = substr($urlPath, strlen($folderPath));

define('URL', $url);
define('URL_PATH', $folderPath);
define('BASE_URL', '/HealthConnection/Public');