<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Money extends Model
{
    // protected $amount;
    public function equals(Money $money) {
        return $this->amount == $money->amount;
    }
}

