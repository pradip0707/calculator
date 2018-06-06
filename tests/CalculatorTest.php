<?php

use PHPUnit\Framework\TestCase;
use App\Library\Calculator;

class CalculatorTest extends TestCase {

    /**
     * Calculator
     */
    protected $calculator;

    /**
     * Basic setup for test cases
     */
    public function setUp()
    {
        $this->calculator = new Calculator();
    }

    /**
     * Test sum zero to two numbers
     *
     * @dataProvider dataForSumFromZeroToTwoNumbers
     */
    public function testSumtZeroToTwoNumbers($data, $sum)
    {
        $this->assertEquals($sum, $this->calculator->add($data));
    }

}
