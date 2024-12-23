<?php
require_once "vendor/autoload.php";


header("Content-Type:application/json");
header("Access-Control-Add-Origin:*");

$request = $_SERVER["REQUEST_URI"];
switch ($request) {
	case '/':
		require __DIR__ . "/views/index.php";
		break;
	case '/token':
		require __DIR__ . "/views/token.php";
		break;
	default:
		http_response_code(404);
		break;
}
