<?php

use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../app/Config/database.php';

$endpoints = require __DIR__ . '/../app/Endpoints/routers.php';


$app = AppFactory::create();

$endpoints($app);

$app->run();
