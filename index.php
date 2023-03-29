<?php 
require("vendor/autoload.php");

use Dotenv\Dotenv;
use Pecee\SimpleRouter\SimpleRouter;
require_once 'routes.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

session_start();
date_default_timezone_set('America/Sao_Paulo');


SimpleRouter::start();


?>