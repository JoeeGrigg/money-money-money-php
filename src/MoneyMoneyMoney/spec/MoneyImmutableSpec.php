<?php

namespace spec\VictoriaPlum\MoneyMoneyMoney;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MoneyImmutableSpec extends ObjectBehavior
{

  public function parse($products) {

    // Define return item
    $transformedProducts = [];

    // Loop over products
    foreach($products as $product) {

      $transformedProduct = [
        'item_code' => $product['item_code'],
        'pence_with_tax' => pence_with_tax($product),
        'pence_without_tax' => pence_without_tax($product),
        'pounds_with_tax' => pounds_with_tax($product),
        'pounds_without_tax' => pounds_without_tax($product)
      ];

      array_push($transformedProducts, $transformedProduct);

    }

  }

  private function pounds_without_tax($product) {
    return $product['price_without_tax'] + $product['price_addition_without_tax'];
  }

  private function pounds_with_tax($product) {
    return pounds_without_tax($product) * (1.0 + $product['tax_rate_adjustment']);
  }

  private function pence_without_tax($product) {
    return pounds_without_tax($product) * 100;
  }

  private function pence_with_tax($product) {
    return pounds_with_tax($product) * 100;
  }

}
