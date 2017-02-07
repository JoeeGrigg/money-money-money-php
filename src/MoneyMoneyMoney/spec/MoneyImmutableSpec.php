<?php

namespace spec\VictoriaPlum\MoneyMoneyMoney;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MoneyImmutableSpec extends ObjectBehavior
{

  function let() {
    $this->beConstructedWith(
      [
        'item_code' => 'TAP135',
        'price_without_tax' => 12.87,
        'price_addition_without_tax' => 3.67,
        'tax_rate_adjustment' => 0.34
      ]
    );
  }

  function it_has_a_price_in_pounds_without_tax() {
    $this->pounds_without_tax()->shouldReturn(16.54);
  }

  function it_has_a_price_in_pounds_with_tax() {
    $this->pounds_with_tax()->shouldReturn(22.16);
  }

  function it_has_a_price_in_pence_without_tax() {
    $this->pence_without_tax()->shouldReturn(1654);
  }

  function it_has_a_price_in_pence_with_tax() {
    $this->pence_with_tax()->shouldReturn(2216);
  }

}
