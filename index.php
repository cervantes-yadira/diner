<?php

// controller
// turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// require autoload file
require_once('vendor/autoload.php');

// instantiate F3 base class
$f3 = Base::instance();

// define a default route
$f3->route('GET /', function() {
    // echo '<h1>Hello from My Diner App!</h1>';
    // render a view page
     $view = new Template();
     echo $view->render('views/home-page.html');

});

// breakfast route
$f3->route('GET /menus/breakfast', function() {
    // echo '<h1>My Breakfast Menu</h1>';
    // render a view page
    $view = new Template();
    echo $view->render('views/breakfast-menu.html');

});

// breakfast route
$f3->route('GET /menus/lunch', function() {
    // echo '<h1>My Breakfast Menu</h1>';
    // render a view page
    $view = new Template();
    echo $view->render('views/lunch-menu.html');

});

// breakfast route
$f3->route('GET /menus/dinner', function() {
    // echo '<h1>My Breakfast Menu</h1>';
    // render a view page
    $view = new Template();
    echo $view->render('views/dinner-menu.html');

});

// run fat-free
$f3->run();
