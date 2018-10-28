<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\MoneyModel;
use App\Money;
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
     * equalsの一般化
     * FrancとDollarを比較する
     * 通貨の概念
     * Dollarの副作用どうする？
     *
     * [x]
     * Moneyの丸め処理どうする？
     * DollarとFrancの重複
     * nullとの透過性比較
     * 他のオブジェクトとの等価性比較
     * timesの一般化
     */

    public function testMultiplication() {
        $five = Money::dollar(5);
        $this->assertEquals(Money::dollar(10), $five->times(2));
        $this->assertEquals(Money::dollar(15), $five->times(3));
    }

    public function testEquality() {
        $this->assertTrue((Money::dollar(5))->equals(Money::dollar(5)));
        $this->assertFalse((Money::dollar(5))->equals(Money::dollar(6)));
        $this->assertTrue((Money::franc(5))->equals(Money::franc(5)));
        $this->assertFalse((Money::franc(5))->equals(Money::franc(6)));
        $this->assertFalse((Money::dollar(5))->equals(Money::franc(5)));
    }

    public function testFrancMultiplication() {
        $five = Money::franc(5);
        $this->assertEquals(Money::franc(10), $five->times(2));
        $this->assertEquals(Money::franc(15), $five->times(3));
    }

    public function testCurrency() {
        $this->assertEquals('USD', Money::dollar(1)->currency());
        $this->assertEquals('CHF', Money::franc(1)->currency());
    }

    public function testDifferentClassEquality() {
        $this->assertTrue((new Money(10, 'CHF'))->equals(new Franc(10, 'CHF')));
    }
}