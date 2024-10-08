<?php


use App\StringCalculator\StringCalculator;
use PHPUnit\Framework\TestCase;

class StringCalculatorTest extends TestCase
{
    /** @test */
    function it_evaluates_an_empty_string_as_0(){
        $calculator = new StringCalculator();

        $this->assertSame(0, $calculator->add(''));
    }

    /** @test */
    function it_finds_the_sum_of_a_single_number(){
        $calculator = new StringCalculator();

        $this->assertSame(5, $calculator->add('5'));
    }

    /** @test */
    function it_finds_the_sum_of_two_numbers(){
        $calculator = new StringCalculator();

        $this->assertSame(15, $calculator->add('5,10'));
    }

    /** @test */
    function it_finds_the_sum_of_any_amount_of_numbers(){
        $calculator = new StringCalculator();

        $this->assertSame(19, $calculator->add('5,5,5,4'));
    }

    /** @test */
//    function it_accepts_a_new_line_character_as_delimiter_too(){
//        $calculator = new StringCalculator();
//
//        $this->assertSame(10, $calculator->add('5,5'));
//    }

    /** @test */
    function negative_numbers_are_not_allowed(){
        $calculator = new StringCalculator();

        $this->expectException(\Exception::class);

        $calculator->add('5, -4');
    }

    /** @test */
    function numbers_greater_than_1000_are_ignored(){
        $calculator = new StringCalculator();

        $calculator = new StringCalculator();

        $this->assertSame(5, $calculator->add('5,1005'));
    }

    /** @test */
    function it_supports_custom_delimiters(){
        $calculator = new StringCalculator();

        $this->assertSame(9, $calculator->add('//:\n5:4'));
    }
}
