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
     * [o]
     * $5 * 2 = %$10
     * $5 + 10 CHF = $10 (レートが2:1の場合)
     * equals()
     *
     * [x]
     * amountをprivateにする
     * Dollarの副作用どうする？
     * Moneyの丸め処理どうする？
     * nullとの透過性比較
     * 他のオブジェクトとの等価性比較
     */

    public function testMultiplication() {
        $five = new Dollar(5);
        $this->assertEquals(new Dollar(10), $product);
        $this->assertEquals(new Dollar(15), $product);
    }
    public function testEquality() {
        $five_1 = new Dollar(5);
        $five_2 = new Dollar(5);
        $six = new Dollar(6);
        $this->assertTrue($five_1->equals($five_2));
        $this->assertFalse($five_1->equals($six));
    }
}