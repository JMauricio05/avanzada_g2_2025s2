<?php

use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../app/Config/database.php';

$cors = require __DIR__.'/../app/Middleware/Cors.php';
$endpoints = require __DIR__ . '/../app/Config/routers.php';


$app = AppFactory::create();

$endpoints($app);
$cors($app);

$app->run();
