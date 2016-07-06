<?php

namespace App;

class FileSeeder implements CurrencySeederInterface
{
    public $data;

    public function __construct($filename)
    {
        $this->data = $this->parse($this->load($filename));
    }

    private function parse($data)
    {
        return json_decode($data);
    }

    private function load($filename)
    {
        $handle = fopen($filename, 'r');
        $contents = fread($handle, filesize($filename));
        fclose($handle);

        return $contents;
    }
}
