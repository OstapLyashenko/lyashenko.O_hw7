<?php

class Autoloader
{
    public function addNamespace(string $prefix, string $dir)
    {

    }

    public function register()
    {
        spl_autoload_register(array($this, 'autoload'));
    }

    public function autoload($class)
    {
        var_dump($class);
        exit;

    }
}

$autoloader = new Autoloader();
$autoloader->addNamespace('Hillel', 'src');
$autoloader->register();
