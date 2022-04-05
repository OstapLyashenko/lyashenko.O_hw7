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
}
}

$autoloader = new Psr4AutoloaderClass();
$autoloader->addNamespace('Hillel', 'src');
$autoloader->register();
