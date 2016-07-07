<?php

namespace App;

use \Exception;

trait Validator
{
    public static function checkCurrencyAvailability(CurrencySeederInterface $data, $currency)
    {
        if (property_exists($data->data, $currency)) {
            return true;
        }
        throw new Exception("'{$currency}' currently unavailable!");
    }

    public static function checkAvailableRates($currency, $rate)
    {
        if (property_exists($currency, $rate)) {
            return true;
        }
        throw new Exception("Currency rates unavailable for {$currency}!");
    }
}
