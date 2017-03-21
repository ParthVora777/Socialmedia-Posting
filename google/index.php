<?php

// include your composer dependencies
require_once 'vendor/autoload.php';

$client = new Google_Client();
$client->setApplicationName("Client_Library_Examples");
$client->setDeveloperKey("AIzaSyBD9c4zw6yLX-j6XjazYxox4rKwOIbcFjE");

$service = new Google_Service_Books($client);
$optParams = array('filter' => 'free-ebooks');
$results = $service->volumes->listVolumes('Henry David Thoreau', $optParams);

echo '<pre>';
print_r($results);
exit;

foreach ($results as $item) {
  echo $item['volumeInfo']['title'], "<br /> \n";
}

