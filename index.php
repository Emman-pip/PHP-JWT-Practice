<?php
require_once "vendor/autoload.php";

$request = $_SERVER["REQUEST_URI"];

header("Content-Type:application/json");
header("Access-Control-Add-Origin:*");

switch ($request) {
	case '/token':
		require __DIR__ . "/views/token.php";
	default:
		echo json_encode(["message" => "Welcome to php-sample-api!!!"]);
}
