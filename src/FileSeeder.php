<?php

namespace App;

class FileSeeder implements CurrencySeederInterface
{
    protected $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    public function getData()
    {
        return $this->format();
    }

    public function format()
    {
        $json = json_decode($this->load($this->filename));

        $data = array();
        foreach ($json as $key => $value) {
            $data[$key] = (array) $value->rates;
        }

        return $data;
    }

    private function load($filename)
    {
        $handle = fopen($filename, 'r');
        $contents = fread($handle, filesize($filename));
        fclose($handle);

        return $contents;
    }
}
