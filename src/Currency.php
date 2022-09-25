<?php

namespace Test;

use http\Exception\InvalidArgumentException;

class Currency
{
    private $isoCode;
    const currencyList =
            [
            'USD',
            'EUR',
            'UAH',
            'JPY',
            'GPB',
            'PLN',
            'HUF',
            'CZK',
            'TRY'
            ];

    public function __construct(string $isoCode)
    {
        $this->setIsoCode($isoCode);
    }

    public function getIsoCode()
    {
        return $this->isoCode;
    }

    private function validate(string $value)
    {
        if(!in_array($value, Currency::currencyList)) {
            throw new InvalidArgumentException('Incorrect currency format. ');
        }
    }

    private function setIsoCode(string $isoCode)
    {
        $this->validate($isoCode);
        $this->isoCode = $isoCode;
    }

    public function equals(Currency $obj2): bool
    {
        if($this->isoCode == $obj2->isoCode){
            return true;
        }
        return false;
    }
}