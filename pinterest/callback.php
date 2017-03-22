<?php

include 'vendor/autoload.php';

use DirkGroenen\Pinterest\Pinterest;

$pinterest = new Pinterest('4890830845109086251', 'fd3d18cf47f1ef546fb51a5bc215c9be09794f355388fa2cdc0626cc7d932591');

if(isset($_GET["code"])) {
	$token = $pinterest->auth->getOAuthToken($_GET["code"]);
	$pinterest->auth->setOAuthToken($token->access_token);

	$board_name = 'Inspire-wiki';

	$board_availability = $pinterest->users->searchMeBoards($board_name);

	if(!empty($board_availability->items)) {
		$board = $board_availability->get(0);
	} else {
		$board = $pinterest->boards->create(array(
			"name"          => $board_name,
			"description"   => "Test Board From API Test"
			));	
	}

	$pinterest->pins->create(array(
		"image_url"     => "https://c1.staticflickr.com/9/8246/8560552146_6b50021122.jpg",
		"board"         => $board->id,
		"note"          => "Donec rutrum congue leo eget malesuada. Nulla porttitor accumsan tincidunt. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Donec sollicitudin molestie malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Vivamus suscipit tortor eget felis porttitor volutpat. Donec rutrum congue leo eget malesuada. Curabitur aliquet quam id dui posuere blandit.",
		));

	$pinterest->pins->create(array(
		"image_url"     => "https://c1.staticflickr.com/9/8246/8560552146_6b50021122.jpg",
		"board"         => $board->id,
		"image"         => "test_image_from_unsplash.jpg",
        "note"          => "Donec rutrum congue leo eget malesuada",
		));
}