<?php

namespace MainProject\Utils;

use Exception;
use MainProject\Utils\TokenUtils;

class Verifier
{
	public static function verify($headers)
	{
		$token = $headers["bearer"];

		if (!TokenUtils::verifyToken($token)) {
			throw new Exception("Invalid token");
		}
		header("bearer:." . $token);
	}
}
