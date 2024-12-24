<?php

namespace MainProject\Views;

use Exception;
use MainProject\Utils\DBOperations;
use MainProject\Utils\Encryptor;
use MainProject\Utils\TokenUtils;

require_once __DIR__ . "/../../vendor/autoload.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
	throw new Exception("Invalid HTTP method.");
}

$env = parse_ini_file(__DIR__ . "/../../.env");

if (!(isset($_POST["username"]) and isset($_POST["password"]))) {
	throw new Exception("Invalid credentials");
}

$username = $_POST["username"];
$password = Encryptor::sha256($_POST["password"]);

if (!DBOperations::checkCredentials($username, $password)) {
	throw new Exception("Invalid credentials");
}

header("bearer:" . TokenUtils::generateToken($env["SECRETKEY"], ["username" => $username, "password" => $password])); // credentials should be stored in the payload, hash it first...

/*retrieve all the tasks of the user in the database*/
// echo json_encode(
// 	DBOperations::getUserTasks($username)->fetchAll()
// );
