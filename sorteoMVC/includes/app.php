<?php

use Dotenv\Dotenv;
use Model\ActiveRecord;

require __DIR__ . '/../vendor/autoload.php';

define('ROOT_DIR', dirname(__DIR__));

$dotenv = Dotenv::createImmutable(ROOT_DIR);
$dotenv->load();

require __DIR__ . '/funciones.php';
require __DIR__ . '/database.php';

$db = conectarDB();
ActiveRecord::setDB($db);