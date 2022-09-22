<?php

namespace Test;

use http\Exception\InvalidArgumentException;

class Money
{
    private $amount;
    private $currency;

    public function __construct($amount, $currency)
    {
        $this->setAmount($amount);
        $this->setCurrency($currency);
    }

    private function setAmount($amount)
    {
        if (!is_int($amount)) {
            throw new InvalidArgumentException('This value must be of type integer or float. ');
        }
        $this->amount = $amount;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    private function setCurrency($currency)
    {
        $currencyList =
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
        if (!in_array($currency, $currencyList)) {
            throw new InvalidArgumentException('Incorrect currency format. ');
        }

        $this->currency = $currency;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function equals(Money $obj2): bool
    {
        if ($this == $obj2) {
            return true;
        }
        return false;
    }

    public function add(Money $obj2)
    {
        if($this->currency !== $obj2->currency) {
            throw new InvalidArgumentException('Both currency must be equals');
        }

        return new Money($this->amount + $obj2->amount, $this->currency);
    }
}