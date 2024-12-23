<?php

namespace MainProject\Views;

echo json_encode(["message" => "Welcome to php-sample-api!!!", "url" => $_SERVER["REQUEST_URI"]]);
