<?php

include 'vendor/autoload.php';

use DirkGroenen\Pinterest\Pinterest;

$pinterest = new Pinterest('4890830845109086251', 'fd3d18cf47f1ef546fb51a5bc215c9be09794f355388fa2cdc0626cc7d932591');

if(isset($_GET["code"])) {
	$token = $pinterest->auth->getOAuthToken($_GET["code"]);
	$pinterest->auth->setOAuthToken($token->access_token);

	$pinterest->boards->create(array(
		"name"          => "my board",
		"description"   => "Test Board From API Test"
		));

	$pinterest->pins->create(array(
		"note"          => "Test board from API - PV",
		"image_url"     => "https://c1.staticflickr.com/9/8246/8560552146_6b50021122.jpg",
		"board"         => "my board"
		));
}