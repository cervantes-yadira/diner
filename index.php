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

// lunch route
$f3->route('GET /menus/lunch', function() {
    // echo '<h1>My Breakfast Menu</h1>';
    // render a view page
    $view = new Template();
    echo $view->render('views/lunch-menu.html');

});

// dinner route
$f3->route('GET /menus/dinner', function() {
    // echo '<h1>My Breakfast Menu</h1>';
    // render a view page
    $view = new Template();
    echo $view->render('views/dinner-menu.html');

});

// order1 route
$f3->route('GET|POST /order1', function($f3) {
    if($_SERVER['REQUEST_METHOD'] == "POST") {
//        var_dump($_POST);

        // get data from POST array
        $food = $_POST['food'];
        $meal = $_POST['meal'];

        if(!empty($food) && isset($meal)) {

            // add data to session array
            $f3->set('SESSION.food', $food);
            $f3->set('SESSION.meal', $meal);

            // send user to order2
            $f3->reroute('order2');
        } else {
            echo "<p>ERROR</p>";
        }
    }
    // render a view page
    $view = new Template();
    echo $view->render('views/order1.html');

});

// order2 route
$f3->route('GET|POST /order2', function($f3) {
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $condiments = $_POST['conds'];

        if(isset($condiments)) {
            $condiments = implode(", ", $condiments);
            $f3->set("SESSION.condiments", $condiments);
        } else {
            echo "ERROR";
        }

        $f3->reroute('summary');
    }
    // render a view page
    $view = new Template();
    echo $view->render('views/order2.html');

});

// order2 route
$f3->route('GET /summary', function($f3) {
// render a view page
    $view = new Template();
    echo $view->render('views/order-summary.html');
});

// run fat-free
$f3->run();
