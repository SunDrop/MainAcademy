<?php

use Controller\FrontController;

spl_autoload_register(function ($class) {
    str_replace('\\', DIRECTORY_SEPARATOR, $class);
    $class .= '.php';
    require_once $class;
});

FrontController::getInstance()->route();
