<?php

namespace MainProject\Views;

use Exception;

if ($_SERVER["REQUEST_METHOD"] !== "GET") {
	throw new Exception("Invalid HTTP method.");
}


echo json_encode(["message" => "Welcome to php-sample-api!!!", "url" => $_SERVER["REQUEST_URI"]]);
