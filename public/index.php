<?php
declare(strict_types=1);

$dbh = new PDO('mysql:host=mysql;port=3306;dbname=sandbox', 'root', 'secret');

require_once '../autoload.php';

$user = new \Hillel\Models\Users();
$c1 = new \Hillel\ValueObjects\RgbColor();
$action = new \Hillel\Controlers\http\HomeAction();
