<?php

namespace MainProject;

require_once __DIR__ . "/../vendor/autoload.php";


header("Content-Type:application/json");
header("Access-Control-Add-Origin:*");

$viewsDir = "/../src/MainProject/views/";
$request = $_SERVER["REQUEST_URI"];
switch ($request) {
	case '/':
		require __DIR__ . $viewsDir . "home.php";
		break;
	case '/token':
		require __DIR__ . $viewsDir . "token.php";
		break;
	default:
		http_response_code(404);
		break;
}
