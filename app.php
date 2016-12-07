<?php

namespace spec\VictoriaPlum\MoneyMoneyMoney;

require __DIR__ . '/vendor/autoload.php';
require './src/MoneyMoneyMoney/spec/MoneyImmutableSpec.php';

$products = [
  [
    'item_code' => 'TAP135',
    'price_without_tax' => 12.87,
    'price_addition_without_tax' => 3.67,
    'tax_rate_adjustment' => 0.34
  ],
  [
    'item_code' => 'BATH123',
    'price_without_tax' => 256.78,
    'price_addition_without_tax' => 30.12,
    'tax_rate_adjustment' => 0.27
  ],
  [
    'item_code' => 'BASIN678',
    'price_without_tax' => 89.99,
    'price_addition_without_tax' => 20.00,
    'tax_rate_adjustment' => 0.50
  ],
  [
    'item_code' => 'SHOWER897',
    'price_without_tax' => 200.00,
    'price_addition_without_tax' => 12.50,
    'tax_rate_adjustment' => 0.02
  ],
  [
    'item_code' => 'TOILET321',
    'price_without_tax' => 95.00,
    'price_addition_without_tax' => 7.80,
    'tax_rate_adjustment' => 0.05
  ]
];

$productsParser = new moneyImmutableSpec();
$parsedProducts = $productsParser->parse($products);

print_r($parsedProducts);

?>
