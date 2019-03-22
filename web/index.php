<?php
    header("Content-Type: text/html");

    require dirname(__DIR__) . "/vendor/autoload.php";
    session_start();

    $url = $_SERVER["REQUEST_URI"];
    $elements = explode("/", $url);

    array_shift($elements);
    array_shift($elements);

    $action = array_shift($elements);

    $i = 0;
    $parameters = array();
    $values = array();
    foreach ($elements as $element) {
        if ($i == 0) {
            $parameters[] = $element;
            $i = 1;
        }
        else {
            $values[] = $element;
            $i = 0;
        }
    }

    foreach ($parameters as $key => $parameter) {
        $_GET[$parameter] = $values[$key];
    }

    $controllerNamespace = "\App\Controller\\View";
    if (class_exists($controllerNamespace) === false) {
        die("Error : controller <b>$controllerNamespace</b> was not found");
    }
    else if (method_exists($controllerNamespace, $action) === false) {
        die("Error : action <b>$action</b> was not found in controller <b>$controllerNamespace</b>");
    }

    $controller = new $controllerNamespace();
    $controller->$action();
