<?php


use App\BeerSong\BeerSong;
use PHPUnit\Framework\TestCase;

class BeerSongTest extends TestCase
{

    /** @test */
    function ninety_nine_bottles_verse()
    {
        $expected = <<<EOT
            99 bottles of beer on the wall
            99 bottles of beer
            Take one down and pass it around
            98 bottles of beer on the wall
            
            EOT;
        $result = (new BeerSong)->verse(99);

        $this->assertEquals($expected, $result);


    }

    /** @test */
    function ninety_eight_bottles_verse()
    {
        $expected = <<<EOT
            98 bottles of beer on the wall
            98 bottles of beer
            Take one down and pass it around
            97 bottles of beer on the wall
            
            EOT;
        $result = (new BeerSong)->verse(98);

        $this->assertEquals($expected, $result);


    }

    /** @test */
    function forty_five_bottles_verse()
    {
        $expected = <<<EOT
            45 bottles of beer on the wall
            45 bottles of beer
            Take one down and pass it around
            44 bottles of beer on the wall
            
            EOT;
        $result = (new BeerSong)->verse(45);

        $this->assertEquals($expected, $result);


    }

    /** @test */
    function two_bottles_verse()
    {
        $expected = <<<EOT
            2 bottles of beer on the wall
            2 bottles of beer
            Take one down and pass it around
            1 bottle of beer on the wall
            
            EOT;
        $result = (new BeerSong)->verse(2);

        $this->assertEquals($expected, $result);


    }

    /** @test */
    function one_bottle_verse()
    {
        $expected = <<<EOT
            1 bottle of beer on the wall
            1 bottle of beer
            Take one down and pass it around
            No more bottles of beer on the wall
            
            EOT;
        $result = (new BeerSong)->verse(1);

        $this->assertEquals($expected, $result);


    }

    /** @test */
    function no_more_bottles_verse()
    {
        $expected = <<<EOT
            No more bottles of beer on the wall
            No more bottles of beer
            Go to the store and buy some more
            99 bottles of beer on the wall
            
            EOT;
        $result = (new BeerSong)->verse(0);

        $this->assertEquals($expected, $result);


    }

    /** @test */
    function it_gets_the_lyrics()
    {
        $expected = file_get_contents(__DIR__.'/stubs/lyrics.stub');

        $result = (new BeerSong)->sing();

        $this->assertEquals($expected, $result);
    }
}
