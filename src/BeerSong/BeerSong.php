<?php

//https://www.codewars.com/kata/52a723508a4d96c6c90005ba

namespace App\BeerSong;

class BeerSong
{
    public function sing()
    {
        return $this->verses(99, 0);
    }

    public function verses($start, $end)
    {
        return implode("\r\n", array_map(
            fn($number) => $this->verse($number),
            range($start, $end)
        ));

    }

    public function verse(int $number)
    {
        switch($number){
            case 2:
                return
                    "2 bottles of beer on the wall\r\n" .
                    "2 bottles of beer\r\n" .
                    "Take one down and pass it around\r\n" .
                    "1 bottle of beer on the wall\r\n";
            case 1:
                return
                    "1 bottle of beer on the wall\r\n" .
                    "1 bottle of beer\r\n" .
                    "Take one down and pass it around\r\n" .
                    "No more bottles of beer on the wall\r\n";
            case 0:
                return
                    "No more bottles of beer on the wall\r\n" .
                    "No more bottles of beer\r\n" .
                    "Go to the store and buy some more\r\n" .
                    "99 bottles of beer on the wall\r\n";
            default:
                return
                    $number . " bottles of beer on the wall\r\n" .
                    $number . " bottles of beer\r\n" .
                    "Take one down and pass it around\r\n" .
                    ($number - 1) . " bottles of beer on the wall\r\n";

        }
//        return
//            ($number === 0 ? 'No more' : $number) . ($number === 1 ? ' bottle' : ' bottles') . " of beer on the wall\r\n".
//            ($number === 0 ? 'No more' : $number) . ($number === 1 ? ' bottle' : ' bottles') . " of beer\r\n".
//            ($number === 0 ? "Go to the store and buy some more\r\n" : "Take one down and pass it around\r\n") .
//            ($number === 1 ? 'No more' : ($number === 0 ? 99 : $number - 1)) . ($number === 2 ? " bottle" : " bottles") . " of beer on the wall\r\n";

    }

}