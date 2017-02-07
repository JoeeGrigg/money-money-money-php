<?php

namespace VictoriaPlum\MoneyMoneyMoney;

class MoneyImmutable {

  # Define product
  private $product;

  # Initialize class
  public function __construct($product) {
    $this->product = $product;
  }

  # Pounds Without Tax
  public function pounds_without_tax() {
    return $this->product['price_without_tax'] + $this->product['price_addition_without_tax'];
  }

  # Pounds With Tax
  public function pounds_with_tax() {
    return round($this->pounds_without_tax($this->product) * (1.0 + $this->product['tax_rate_adjustment']), 2);
  }

  # Pence Without Tax
  public function pence_without_tax() {
    return intval(round($this->pounds_without_tax($this->product) * 100));
  }

  # Pence With Tax
  public function pence_with_tax() {
    return intval(round($this->pounds_with_tax($this->product) * 100));
  }

}

?>
