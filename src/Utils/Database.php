<?php

namespace MainProject\Utils;

use DateTime;
use Exception;
use PDO;

class Database
{
	public static function executeQuery($sql)
	{
		try {
			$db = new PDO("sqlite:" . __DIR__ . "/../../sample.db");
			$db->exec($sql);
			return true;
		} catch (Exception $err) {
			throw new Exception("Database error.");
		}
	}

	public static function query($sql)
	{
		try {
			$db = new PDO("sqlite:" . __DIR__ . "/../../sample.db");
			$data = $db->query($sql);
			return $data;
		} catch (Exception $err) {
			throw new Exception("Database error: querying\n" . $sql . "\n" . $err);
		}
	}
}
