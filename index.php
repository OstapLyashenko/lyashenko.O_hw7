<?php
declare(strict_types=1);
$dbh = new PDO('mysql:host=mysql;port=3306;dbname=sandbox', 'root', 'secret');

// подключения функції автозагрузки

//spl_autoload_register(function ($class){
//   $path =  str_replace('Hillel','src',$class) . '.php';
//   $path =  str_replace('\\', '/', $path);
//
//   require_once $path;
//});

// подключения класа автозагрузки

require_once 'autoload.php';

// -----

$user = new \Hillel\Models\User();
$c1 = new \Hillel\ValueObjackts\RgbColor();
$action = new  \Hillel\Controlers\http\HomeAction();