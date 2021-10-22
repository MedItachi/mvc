<?php

use App\core\Request;
use App\data\Database;


require_once realpath("vendor/autoload.php");


$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$app = new Request();
