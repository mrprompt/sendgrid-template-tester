<?php
$loader = require 'vendor/autoload.php';
$loader->register();

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->overload();
$dotenv->required('SENDGRID_API_TOKEN');

return $loader;
