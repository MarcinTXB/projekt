<?php

spl_autoload_register(function($class)
{
	include $class . '.php';
});

ini_set('display_errors', 1);
error_reporting(E_ALL);
?>