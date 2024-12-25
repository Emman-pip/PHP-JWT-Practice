<?php

require_once __DIR__ . "/../vendor/autoload.php";

header("Content-Type:application/json");
header("Access-Control-Add-Origin:*");

use MainProject\Utils\TaskOperations;

$viewsDir = "/../src/Views/";
$request = $_SERVER["REQUEST_URI"];
switch ($request) {
	case '/':
		require __DIR__ . $viewsDir . "home.php";
		break;
	case '/user-log':
		require __DIR__ . $viewsDir . "log.php";
		break;
	case '/tasks':
		require __DIR__ . $viewsDir . "tasks.php";
		break;
	case '/user-new':
		require __DIR__ . $viewsDir . "new.php";
		break;
	case '/task-new':
		/*this requires a post request, token, and post variables (taskName, description)	*/
		$task = new TaskOperations();
		$task->newTask();
		break;
	case '/task-update':
		/*this requires a post request, token, and post variables (taskId, taskName, description)	*/
		$task = new TaskOperations();
		$task->updateTask();
		break;
	case '/task-delete':
		/*this requires a post request, token, and post variables (taskId)	*/
		$task = new TaskOperations();
		$task->deleteTask();
		break;
	default:
		http_response_code(404);
		break;
}
