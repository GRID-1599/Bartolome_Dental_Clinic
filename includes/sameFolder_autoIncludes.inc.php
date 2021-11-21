<?php

spl_autoload_register('autoLoader');

function autoLoader($classname)
{
    $extension = '.class.php';
    $fullpath = $classname . $extension;

    if (!file_exists($fullpath)) {
        return false;
    }
    echo $fullpath . '<br>';
    include_once $fullpath;
}