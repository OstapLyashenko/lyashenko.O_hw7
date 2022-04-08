<?php

class Autoloader
{
    protected $prefixes = array();
    public function addNamespace($prefix, $base_dir, $prepend = false)
    {
        $prefix = trim($prefix, '\\') . '\\';

        $base_dir = rtrim($base_dir, DIRECTORY_SEPARATOR) . '/';
        if (isset($this->prefixes[$prefix]) === false) {
            $this->prefixes[$prefix] = array();
        }
        if ($prepend) {
            array_unshift($this->prefixes[$prefix], $base_dir);
        } else {
            $this->prefixes[$prefix][] = $base_dir;
        }
    }

    public function register()
    {
        spl_autoload_register(array($this, 'autoload'));
    }

    public function autoload($class)
    {
        while (false !== $pos = strrpos($prefix, '\\')) {
            $prefix = substr($class, 0, $pos + 1);
            $class = substr($class, $pos + 1);
            $mapped_file = $this->autoload($class);
            if ($mapped_file) {
                return $mapped_file;
            }
            $prefix = rtrim($prefix, '\\')
            .str_replace('\\', '/', $class)
            . '.php';

            if ($this->requireFile($class)) {
                return $class;
            }
        }
    }
    protected function requireFile($class)
    {
        if (file_exists($class)) {
            require $class;
            return true;
        }
        return false;
    }
}
$autoloader = new Autoloader();
$autoloader->addNamespace('Hillel', 'src');
$autoloader->register();
var_dump($autoloader);