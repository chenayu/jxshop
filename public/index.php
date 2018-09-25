<?php
define('ROOT',__DIR__.'/../');

require(ROOT.'libs/functions.php');

function load($class)
{
    $path = str_replace('\\','/',$class);
    require(ROOT.$path.'.php');
}

spl_autoload_register('load');

$controller = '\controllers\IndexController';
$action = 'index';

if(isset($_SERVER['PATH_INFO']))
{
    $router = explode('/',$_SERVER['PATH_INFO']);
    $controller = '\controllers\\'.ucfirst($router[1]).'Controller';
    $action = $router[2];
}

$C = new $controller;
$C->$action();