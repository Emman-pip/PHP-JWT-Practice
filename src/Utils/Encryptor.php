<?php

namespace MainProject\Utils;

class Encryptor
{
	public static function sha256($toBeHashed)
	{
		return hash("sha256", $toBeHashed);
	}
}
