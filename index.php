<?php
declare(strict_types=1);
$dbh = new PDO('mysql:host=mysql;port=3306;dbname=sandbox', 'root', 'secret');

$a = 10;

class RGB_color{
    private $red;
    private $green;
    private $blue;

    public function __construct(int $red, int $green, int $blue)
    {
        $this->setRed($red);
        $this->setGreen($green);
        $this->setBlue($blue);
    }

    public function getRad(): int
    {
        return $this->red;
    }
    public function setRed($red): void
    {
        if($this->isValid($red)){
            throw new \mysql_xdevapi\Exception('red color invalid.');
        }
        $this->red = $red;
    }

    public function getGreen(): int
    {
        return $this->green;
    }

    public function setGreen($green): void
    {
        if($this->isValid($green)){
        throw new \mysql_xdevapi\Exception('green color invalid.');
        }
        $this->green = $green;
    }

    public function getBlue(): int
    {
        return $this->blue;
    }
    public function setBlue($blue): void
    {
        if($this->isValid($blue)){
            throw new \mysql_xdevapi\Exception('blue color invalid.');
        }
        $this->blue = $blue;
    }
    private function isValid(int $value): bool
    {
       return ($value < 0 || $value > 255);
    }
    public function equal(RGB_color $color): bool
    {
        if($this->red === $color->getRad() && $this->blue === $color->getBlue() && $this->green === $color->getGreen())
        {
          return true;
        }else{
            return false;
        }
    }
    public function mix(RGB_color $color){
        invalid(($this->red + $color->red) / 2);
        invalid(($this->green + $color->green) / 2);
        invalid(($this->blue + $color->blue) / 2);
    }
    public static function random(){
        return new  RGB_color(
            rand(0,255),
            rand(0,255),
            rand(0,255)
        );
    }
}
$c1 = RGB_color::random();
$c2 = RGB_color::random();

$c3 = $c1->mix($c2);
var_dump($c3);
