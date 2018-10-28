<?php

namespace App;

use \App\Money;

class Franc extends Money
{
    public function __construct(int $amount) {
        $this->amount = $amount;
    }

    public function times(int $multiplier) {
        return new Franc($this->amount * $multiplier);
    }
}

