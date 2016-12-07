<?php

namespace spec\VictoriaPlum\MoneyMoneyMoney;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MoneyImmutableSpec extends ObjectBehavior
{

  private function pounds_without_tax($product) {
    return $product['price_without_tax'] + $product['price_addition_without_tax'];
  }

  private function pounds_with_tax($product) {
    return round($this->pounds_without_tax($product) * (1.0 + $product['tax_rate_adjustment']), 2);
  }

  private function pence_without_tax($product) {
    return round($this->pounds_without_tax($product) * 100);
  }

  private function pence_with_tax($product) {
    return round($this->pounds_with_tax($product) * 100);
  }

  public function parse($products) {

    // Define return item
    $transformedProducts = [];

    // Loop over products
    foreach($products as $product) {

      $transformedProduct = [
        'item_code' => $product['item_code'],
        'pence_with_tax' => $this->pence_with_tax($product),
        'pence_without_tax' => $this->pence_without_tax($product),
        'pounds_with_tax' => $this->pounds_with_tax($product),
        'pounds_without_tax' => $this->pounds_without_tax($product)
      ];

      array_push($transformedProducts, $transformedProduct);

    }

    return $transformedProducts;

  }

}
