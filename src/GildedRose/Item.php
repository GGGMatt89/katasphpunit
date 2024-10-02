<?php

namespace App\GildedRose;

class Item
{
    public $name;
    public $sellIn;
    public $quality;

    public function __construct(int $quality, int $sellIn){
        $this->sellIn = $sellIn;
        $this->quality = $quality;
    }

    public function tick()
    {
        $this->sellIn -= 1;
        if($this->quality <= 0){
            return;
        }

        $this->quality -= 1;

        if($this->sellIn <= 0 && $this->quality > 0){
            $this->quality -= 1;
        }
    }
}