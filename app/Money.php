<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

abstract class Money extends Model
{
    // protected $amount;
    abstract function times(int $multiplier): Money;
    public function equals(Money $money) {
        return $this->amount == $money->amount
        && get_class($this) == get_class($money);
    }
    static function dollar(int $amount): Money {
        return new Dollar($amount);
    }
    static function franc(int $amount): Money {
        return new Franc($amount);
    }
}

