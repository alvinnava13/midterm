<?php
session_start();
// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Require autoload file
require_once('vendor/autoload.php');
require_once('model/validate.php');

// Create an instance of the Base class
$f3 = Base::instance();

// Turn on Fat-Free error reporting
$f3->set('DEBUG', 3);

//Define array
$f3->set('midterm', array('This midterm is easy', 'I like midterms', 'Today is Monday'));

// Define a default route
$f3->route('GET /', function () {

    echo "<h1>Midterm Survey</h1>";
    echo "<a href='survey'>Take my Midterm Survey</a>";
});



// Define a survey route
$f3->route('GET|POST /survey', function($f3) {

    if(!empty($_POST)){
        // Get data from form
        $name = $_POST['name'];
        $midterm = $_POST['midterm'];

        // Add to hive
        $f3->set('name', $name);
        $f3->set('midterm', $midterm);

        // If data is valid...
        if(validForm()){
            //Write data to Session
            $_SESSION['name'] = $name;
            //$_SESSION['midterm'] = "";

            if(!empty($_POST['midterm']))
            {
                $_SESSION['midterm'] = implode(", ", $_POST['midterm']);
            }

            //Redirect to Summary
            $f3->reroute('/summary');
        }

    }
    //Display survey form
    $view = new Template();
    echo $view->render('views/survey-form.html');
});



//Define a summary route
$f3->route('GET /summary', function() {

    //Display summary
    $view = new Template();
    echo $view->render('views/summary.html');
});

// Run Fat-free
$f3->run();
