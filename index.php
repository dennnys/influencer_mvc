<?php 

// entre principale
define('INFL', TRUE);

// le configuration
include('config/config.ini.php');

// Autoloader
include('config/autoloader.php');

$routeur = new Routeur();
$routeur->execute();

