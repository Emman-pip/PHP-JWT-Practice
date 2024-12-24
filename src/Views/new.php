<?php

use Exception;
use MainProject\Utils\DBOperations;
use MainProject\Utils\Encryptor;

echo json_encode(["message" => "welcome to new.php"]);

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
	throw new Exception("Invalid HTTP method.");
}

$username = $_POST["username"];
$password = Encryptor::sha256($_POST["password"]);

if (DBOperations::checkCredentials($username, $password)) {
	throw new Exception("Invalid username");
}

try {
	DBOperations::insertUsers($username, $password);
} catch (Exception $err) {
	throw new Exception("Error:" . $err);
}
