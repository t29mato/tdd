<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MoneyModelTest extends TestCase
{
    /**
     * 1. $5 * 2 = %$10
     * 2. $5 + 10 CHF = $10 (レートが2:1の場合)
     * 
     */
    
    public function testMultiplication() {
        Dollar five = new Dollar(5);
        five.time(2);
        assertEquals(10, five.amount);
    }     
}
