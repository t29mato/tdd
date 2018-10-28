<?php

namespace App;

use \App\Money;

class Dollar extends Money
{
    public function __construct(int $amount) {
        $this->amount = $amount;
    }

    public function times(int $multiplier) {
        return new Dollar($this->amount * $multiplier);
    }
}

