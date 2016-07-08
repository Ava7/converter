<?php

namespace App;

use \Exception;

class Currency
{
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function get($input, $output)
    {
        return $this->check($input, $output);
    }

    public function check($input, $output)
    {
        $input_currency = $this->getInputCurrency($input);
        $rate = $this->getOutputCurrency($input_currency, $output);

        return $rate;
    }

    private function getInputCurrency($input)
    {
        if (isset($this->data[$input])) {
            return $this->data[$input];
        }
        throw new Exception('Invalid input currency');
    }

    private function getOutputCurrency($input, $output)
    {
        if (isset($input[$output])) {
            return $input[$output];
        }
        throw new Exception('Data currency unavailable');
    }
}
