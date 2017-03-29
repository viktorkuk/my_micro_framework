<?php

//error_reporting(E_ALL);
error_reporting(0);

session_start();
include_once './config/config.php';
include_once './lib/functions.php';

$router = new Router();
$router->route();