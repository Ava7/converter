<?php

namespace App;

require_once __DIR__ . '/../vendor/autoload.php';

$seeder = new FileSeeder(__DIR__ . '/currency.json');
$converter = new CurrencyConverter($seeder);

// Usage
// $converter->convert(AMOUNT, FROM_CURRENCY, TO_CURRENCY)
$result = $converter->convert($argv[1], $argv[2], $argv[3]);

echo "{$argv[1]} {$argv[2]} equal to {$result} {$argv[3]}\n";
