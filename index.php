<?php

require "framework/config.php";
require_once "framework/Psr4AutoloaderClass.php"; 
require_once "framework/FrontController.php";
session_start();
$start = new \Framework\FrontController();
$start->run();
?>