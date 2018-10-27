<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\MoneyModel;
use App\Dollar;

class MoneyModelTest extends TestCase
{
    /**
     * 1. $5 * 2 = %$10
     * 2. $5 + 10 CHF = $10 (レートが2:1の場合)
     *
     * amountをprivateにする
     * Dollarの副作用どうする？
     * Moneyの丸め処理どうする？
     */

    public function testMultiplication() {
        $five = new Dollar(5);
        $product = $five->times(2);
        $this->assertEquals(10, $product->amount);
        $product = $five->times(3);
        $this->assertEquals(15, $product->amount);
    }
}