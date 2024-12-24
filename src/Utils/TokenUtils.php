<?php

namespace MainProject\Utils;

require_once __DIR__ . "/../../vendor/autoload.php";

use Firebase\JWT\Key;
use Firebase\JWT\JWT;

class TokenUtils
{
	public static function generateToken($key, $payload) # returns a string
	{
		$jwt = JWT::encode($payload, $key, "HS256", null, null);
		/*list($headersB64, $payloadB64, $sig) = explode(".", $jwt);*/
		return $jwt;
	}


	public static function payloadDecoder($jwt)
	{
		list($headersB64, $payloadB64, $sig) = explode(".", $jwt);
		$decoded = base64_decode($payloadB64);
		return json_decode($decoded, true);
	}

	public static function verifyToken($jwt)
	{
		$env = parse_ini_file(__DIR__ . "/../../.env");
		$username = TokenUtils::payloadDecoder($jwt)["username"];
		$userData = Database::query("SELECT username, password from Users where username='" . $username . "';")->fetch();
		$regeneratedToken = TokenUtils::generateToken($env["SECRETKEY"], ["username" => $userData["0"], "password" => $userData["1"]]);
		if ($regeneratedToken != $jwt) {
			return false;
		}
		return true;
	}
}
// (evil-local-mode)
