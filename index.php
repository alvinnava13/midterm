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
    echo "<a href='survey'>Take my Midterm Survey</a>";
});



// Define a survey route
$f3->route('GET|POST /survey', function($f3) {
    //Display survey form
    $view = new Template();
    echo $view->render('views/survey-form.html');
});

// Run Fat-free
$f3->run();
