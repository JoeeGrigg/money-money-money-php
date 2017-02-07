<?php

namespace VictoriaPlum\MoneyMoneyMoney;

class BulkMoneyParser {

  # Define Properties
  private $products = [];

  # Initialize class
  public function __construct($products) {
    $this->products = $products;
  }

  # Parse items
  public function process() {
  
    // Define return item
    $transformedProducts = [];

    // Loop over products
    foreach($this->products as $product) {

      $money = new MoneyImmutable($product);

      $transformedProduct = [
        'item_code' => $product['item_code'],
        'pence_with_tax' => $money->pence_with_tax(),
        'pence_without_tax' => $money->pence_without_tax(),
        'pounds_with_tax' => $money->pounds_with_tax(),
        'pounds_without_tax' => $money->pounds_without_tax()
      ];

      array_push($transformedProducts, $transformedProduct);

    }

    return $transformedProducts;

  } 

}

?>
