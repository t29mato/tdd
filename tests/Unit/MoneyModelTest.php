<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\MoneyModel;
use App\Dollar;
use App\Franc;

class MoneyModelTest extends TestCase
{
    /**
     * [o]
     * $5 * 2 = %$10
     * $5 + 10 CHF = $10 (レートが2:1の場合)
     * equals()
     * amountをprivateにする
     * 5CHF * 2 = 10CHF
     *
     * [x]
     * Dollarの副作用どうする？
     * Moneyの丸め処理どうする？
     * nullとの透過性比較
     * 他のオブジェクトとの等価性比較
     * DollarとFrancの重複
     * equalsの一般化
     * timesの一般化
     */

    public function testMultiplication() {
        $five = new Dollar(5);
        $this->assertEquals(new Dollar(10), $five->times(2));
        $this->assertEquals(new Dollar(15), $five->times(3));
    }

    public function testEquality() {
        $this->assertTrue((new Dollar(5))->equals(new Dollar(5)));
        $this->assertFalse((new Dollar(5))->equals(new Dollar(6)));
        $this->assertTrue((new Franc(5))->equals(new Franc(5)));
        $this->assertFalse((new Franc(5))->equals(new Franc(6)));
    }

    public function testFrancMultiplication() {
        $five = new Franc(5);
        $this->assertEquals(new Franc(10), $five->times(2));
        $this->assertEquals(new Franc(15), $five->times(3));
    }
}