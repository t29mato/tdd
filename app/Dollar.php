<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dollar extends Model
{

    public $amount;

    public function __construct(int $amount) {
        $this->amount = $amount;
    }

    public function times(int $multiplier) {
        return new Dollar($this->amount * $multiplier);
    }

    public function equals(Dollar $dollar) {
        return $this->amount == $dollar->amount;
    }
}

