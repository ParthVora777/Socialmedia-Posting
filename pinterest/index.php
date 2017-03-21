<?php
include 'vendor/autoload.php';

use DirkGroenen\Pinterest\Pinterest;

$pinterest = new Pinterest('4890830845109086251', 'fd3d18cf47f1ef546fb51a5bc215c9be09794f355388fa2cdc0626cc7d932591');

$loginurl = $pinterest->auth->getLoginUrl('https://localhost/extra/socialmedia-posting/pinterest/callback.php', array('read_public'));
echo '<a href=' . $loginurl . '>Authorize Pinterest</a>';
