<?php

namespace App;

class CurrencyConverter
{
    private $currency;

    public function __construct(CurrencySeederInterface $currency)
    {
        $this->currency = $currency;
    }

    public function convert($amount, $from, $to)
    {
        return $amount * $this->currency->data->{$from}->rates->{$to};
    }
}
