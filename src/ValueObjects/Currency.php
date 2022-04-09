<?php

namespace Hillel\ValueObjects;

use Hillel\Enums\code;

class Currency
{
  private Code $isoCode;
    public function __construct(Code $isoCode)
    {
        $this->setIsoCode($isoCode);
    }
    public function getIsoCode(): Code
    {
        return $this->isoCode;
    }

    private function setIsoCode(Code $isoCode): void
    {
        $this->isoCode = $isoCode;
    }
}
 $USD = new Currency(code::USD);