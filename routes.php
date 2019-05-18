<?php

function call($controller, $action) {
    //require the file that matches the controller name
    require_once('controllers/' . $controller . '_controller.php');

    $controllerClassName = $controller . 'Controller';
    $controller = new $controllerClassName();

    //call the requested action
    $controller->{ $action }();
}

//list the allowed controllers and their actions for validation
$controllers = array('pages' => ['error'],
    'mood' => ['view', 'recommendations'],
    'upload' => ['view', 'upload'],
);

//check that the requested controller and action are both allowed
if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) { //if you try to access something else, you get directed to the error page
        call($controller, $action);
    } else {
        call('pages', 'error');
    }
} else {
    call('pages', 'error');
}
?>