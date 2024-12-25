<?php

namespace MainProject\Utils;

use Exception;
use MainProject\Utils\DBOperations;
use MainProject\Utils\TokenUtils;
use MainProject\Utils\Verifier;


class TaskOperations
{
	private $username;

	public function __construct()
	{
		$token = getallheaders()["bearer"];
		/*throw new Exception($token);*/
		Verifier::verify(getallheaders());
		$this->username = TokenUtils::payloadDecoder($token)["username"];
	}

	public static function verifyRequestMethod($mustBeMethod, $method)
	{
		if ($mustBeMethod !== $method) {
			throw new Exception("Invalid Method");
		}
	}

	private function matchingOwners($taskId, $username)
	{
		$data = Database::query("select owner from Tasks where taskId=" . $taskId);
		$owner = $data->fetch();
		if ($owner["owner"] !== $username) {
			throw new Exception("Invalid credentials.");
		}
	}

	public function newTask()
	{
		TaskOperations::verifyRequestMethod("POST", $_SERVER["REQUEST_METHOD"]);
		if (!(isset($_POST["taskName"]) and isset($_POST["description"]))) {
			throw new Exception("Some fields are empty");
		}
		DBOperations::insertTasks($_POST["taskName"], $_POST["description"], $this->username);
	}
	public function updateTask()
	{
		TaskOperations::verifyRequestMethod("POST", $_SERVER["REQUEST_METHOD"]); // PUT DAPAT KASO DI KO MAKUHA BODY PAG PUT// somthing to do with the content type...
		if (!(isset($_POST["taskName"]) and isset($_POST["description"]) and  isset($_POST["taskId"]))) {
			throw new Exception("Some fields are empty");
		}
		TaskOperations::matchingOwners($_POST["taskId"], $this->username);
		DBOperations::updateTasks(
			$_POST["taskId"],
			$_POST["taskName"],
			$_POST["description"]
		);
	}
	public function deleteTask()
	{
		TaskOperations::verifyRequestMethod("POST", $_SERVER["REQUEST_METHOD"]); // DELETE DAPAT KASO DI KO MAKUHA BODY PAG PUT// somthing to do with the content type...
		if (!(isset($_POST["taskId"]))) {
			throw new Exception("Invalid task id");
		}
		TaskOperations::matchingOwners($_POST["taskId"], $this->username);
		// check if matching owners
		DBOperations::deleteTasks(
			$_POST["taskId"],
		);
	}
}
