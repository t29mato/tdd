<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Franc extends Model
{

    private $amount;

    public function __construct(int $amount) {
        $this->amount = $amount;
    }

    public function times(int $multiplier) {
        return new Franc($this->amount * $multiplier);
    }

    public function equals(Franc $franc) {
        return $this->amount == $franc->amount;
    }
}

