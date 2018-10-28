<?php

namespace App;

use \App\Money;

class Franc extends Money
{
    public function __construct(int $amount, string $currency) {
        parent::__construct($amount, $currency);
    }
}

