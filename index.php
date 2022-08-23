<?php

require_once(__DIR__ . '/vendor/autoload.php');

$redis = new \Predis\Client();

spl_autoload_register();

use MVC\Controllers\Controller;

$obj = new Controller($_SERVER['REQUEST_URI'], $redis);
echo $obj->render();
