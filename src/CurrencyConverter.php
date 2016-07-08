<?php

namespace App;

use \Exception;

class CurrencyConverter
{
    private $currency;

    public function __construct(CurrencySeederInterface $currency)
    {
        $this->currency = $currency;
    }

    public function convert($amount, $input, $output)
    {
        try {
            $data = $this->currency->getData();
            $rates = new Currency($data);
            $rate = $rates->get($input, $output);

            $amount = $this->validateAmount($amount);
        } catch (Exception $e) {
            die($e->getMessage());
        }

        return $amount * $rate;
    }

    private function validateAmount($amount)
    {
        $amount = (int) $amount;
        if ($amount > 0) {
            return $amount;
        }
        throw new Exception('Invalid amount, please use positive numbers only.');
    }
}
