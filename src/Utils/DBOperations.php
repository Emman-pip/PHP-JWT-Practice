<?php

namespace MainProject\Utils;

use DateTime;

class DBOperations
{
	public static function insertUsers($username, $password)
	{
		/*password should be hashed before sending here*/
		Database::executeQuery(sprintf("INSERT INTO Users(username, password) VALUES ('%s', '%s')", $username, $password));
	}
	public static function insertTasks($taskName, $description, $username)
	{
		$date = date('Y-m-d H:i:s');

		Database::executeQuery(sprintf("INSERT INTO Tasks(taskName, description, lastUpdated, owner) VALUES ('%s', '%s', '%s', '%s')", $taskName, $description, $date, $username));
	}

	public static function updateTasks($taskId, $taskName, $description)
	{
		$date = date('Y-m-d H:i:s');
		Database::executeQuery(sprintf("UPDATE Tasks set taskName='%s', description='%s', lastUpdated='%s' where taskId=%d;", $taskName, $description, $date, $taskId));
	}


	public static function deleteTasks($taskId)
	{
		Database::executeQuery(sprintf("delete from Tasks where taskId=%d", $taskId));
	}

	public static function getUserTasks($username)
	{
		return Database::query(sprintf("Select * from Tasks where owner='%s' ORDER BY lastUpdated ASC", $username));
	}

	public static function checkCredentials($username, $password)
	{
		/*password should be hashed before sending here*/
		$data = Database::query(sprintf("SELECT * FROM Users where username='%s' and password='%s'", $username, $password));
		return count($data->fetchAll()) > 0;
	}
}
