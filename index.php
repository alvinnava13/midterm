<?php
session_start();
// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Require autoload file
require_once('vendor/autoload.php');

// Create an instance of the Base class
$f3 = Base::instance();

// Turn on Fat-Free error reporting
$f3->set('DEBUG', 3);

// Define a default route
$f3->route('GET /', function () {

    echo "<h1>Midterm Survey</h1>";
    echo "<a href='link'>Take my Midterm Survey</a>";
});

// Run Fat-free
$f3->run();
