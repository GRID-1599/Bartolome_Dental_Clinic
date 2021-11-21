<?php

spl_autoload_register('autoLoader');

function autoLoader($classname)
{
    $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

    if (strpos($url, 'includes') !== false) {
        $path = '../classes/';
    } else {
        $path = 'classes/';
    }

    $extension = '.class.php';

    $fullpath = $path . $classname . $extension;

    // if (!file_exists($fullpath)) {
    //     return false;
    // }
    // echo $fullpath;

    include_once $fullpath;
}
