<?php 

spl_autoload_register(function($classname){

	require $filename = "../app/models/".ucfirst($classname).".php";
});

require '../vendor/autoload.php';

require 'config.php';
require 'functions.php';
require 'Database.php';
require 'Model.php';
require 'Controller.php';
require 'Middleware.php';
require 'Router.php';
