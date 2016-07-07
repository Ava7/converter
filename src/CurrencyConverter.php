<?php

namespace App;

use \Exception;

class CurrencyConverter
{
    use Validator;

    private $currency;

    public function __construct(CurrencySeederInterface $currency)
    {
        $this->currency = $currency;
    }

    public function convert($amount, $from, $to)
    {
        try {
            Validator::checkCurrencyAvailability($this->currency, $from);
            Validator::checkAvailableRates($this->currency->data->{$from}->rates, $to);
        } catch (Exception $e) {
            die($e->getMessage());
        }

        return $amount * $this->currency->data->{$from}->rates->{$to};
    }
}
