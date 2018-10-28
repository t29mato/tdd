<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Money extends Model
{
    protected $amount;
    protected $currency;
    public function __construct(int $amount, string $currency) {
        $this->amount = $amount;
        $this->currency = $currency;
    }
    function times(int $multiplier): Money {
        return new Money($this->amount * $multiplier, $this->currency);
    }
    function currency(): string{
        return $this->currency;
    }
    public function equals(Money $money) {
        return $this->amount == $money->amount
        && $this->currency() == $money->currency();
    }
    static function dollar(int $amount): Money {
        return new Money($amount, 'USD');
    }
    static function franc(int $amount): Money {
        return new Money($amount, 'CHF');
    }
}

