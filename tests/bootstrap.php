<?php

define('ROOT_PATH', realpath(__DIR__ . '/../') . '/');
$autoloader = require_once ROOT_PATH . 'vendor/autoload.php';
$autoloader->add('Data', ROOT_PATH . 'src/');

