<?php

namespace App;

use \App\Money;

class Dollar extends Money
{
    public function __construct(int $amount, string $currency) {
        parent::__construct($amount, $currency);
    }
}

