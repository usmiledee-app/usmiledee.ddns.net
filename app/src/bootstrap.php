<?php

define("SOURCE_PATH", dirname(__FILE__));
define("CONF_DIR", SOURCE_PATH . "/Config/");
define("CTRL_DIR", SOURCE_PATH . "/Controllers/");
define("DATA_DIR", SOURCE_PATH . "/Models/");
define("VIEW_DIR", SOURCE_PATH . "/Views/");

$method = $_SERVER["REQUEST_METHOD"];

$dbhost = "172.18.0.1";
$dbuser = "usmile";
$dbpass = "D3v0t3D%$";

require_once CONF_DIR . "App.php";
require_once CONF_DIR . "Controller.php";
require_once CONF_DIR . "Database.php";
