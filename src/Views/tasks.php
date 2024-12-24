<?php

use MainProject\Utils\DBOperations;
use MainProject\Utils\TokenUtils;

/*echo json_encode(["message" => "welcome to tasks"]);*/

$headers = getallheaders();
$token = $headers["bearer"];

header("bearer:." . $token);

if (TokenUtils::verifyToken($token)) {
	$username = TokenUtils::payloadDecoder($token)["username"];
	echo json_encode(
		DBOperations::getUserTasks($username)->fetchAll()
	);
} else {
	throw new Exception("Invalid token");
}
