<?php

//https://github.com/notmyself/GildedRose

namespace App\GildedRose;

use http\Exception\InvalidArgumentException;

class GildedRose
{
//    public $name;
//
//    public $quality;
//
//    public $sellIn;
//
//    public function __construct($name, $quality, $sellIn)
//    {
//        $this->name = $name;
//        $this->quality = $quality;
//        $this->sellIn = $sellIn;
//    } // moved to item classes

    private static $items = [
        'normal' => Item::class,
        'Aged Brie' => Brie::class,
        'Sulfuras, Hand of Ragnaros' => Sulfuras::class,
        'Backstage passes to a TAFKAL80ETC concert' => BackstagePass::class,
        'Conjured Mana Cake' => Conjured::class
    ];

    public static function of($name, $quality, $sellIn)
    {

//        return new static($name, $quality, $sellIn);



        if(! array_key_exists($name, self::$items)) {
            throw new InvalidArgumentException('Item type does not exist');
        }
        $class = self::$items[$name];

        return new $class($quality, $sellIn);
//        switch($name){
//            case 'normal':
//                return new Item($quality, $sellIn);
//            case 'Aged Brie':
//                return new Brie($quality, $sellIn);
//            case 'Sulfuras, Hand of Ragnaros':
//                return new Sulfuras($quality, $sellIn);
//            case 'Backstage passes to a TAFKAL80ETC concert':
//                return new BackstagePass($quality, $sellIn);
//        } // updated with the lookup table approach
    }

//    public function tick() //moved in the item classes
//    {
//        switch($this->name){
//            case 'normal':
//                return $this->normalTick();
//            case 'Aged Brie':
//                return $this->brieTick();
//            case 'Sulfuras, Hand of Ragnaros':
//                return $this->sulfurasTick();
//            case 'Backstage passes to a TAFKAL80ETC concert':
//                return $this->backstagePassesTick();
//        }


//        if ($this->name != 'Aged Brie' and $this->name != 'Backstage passes to a TAFKAL80ETC concert') {
//            if ($this->quality > 0) {
//                if ($this->name != 'Sulfuras, Hand of Ragnaros') {
//                    $this->quality = $this->quality - 1;
//                }
//            }
//        } else {
//            if ($this->quality < 50) {
//                $this->quality = $this->quality + 1;
//
//                if ($this->name == 'Backstage passes to a TAFKAL80ETC concert') {
//                    if ($this->sellIn < 11) {
//                        if ($this->quality < 50) {
//                            $this->quality = $this->quality + 1;
//                        }
//                    }
//                    if ($this->sellIn < 6) {
//                        if ($this->quality < 50) {
//                            $this->quality = $this->quality + 1;
//                        }
//                    }
//                }
//            }
//        }
//
//        if ($this->name != 'Sulfuras, Hand of Ragnaros') {
//            $this->sellIn = $this->sellIn - 1;
//        }
//
//        if ($this->sellIn < 0) {
//            if ($this->name != 'Aged Brie') {
//                if ($this->name != 'Backstage passes to a TAFKAL80ETC concert') {
//                    if ($this->quality > 0) {
//                        if ($this->name != 'Sulfuras, Hand of Ragnaros') {
//                            $this->quality = $this->quality - 1;
//                        }
//                    }
//                } else {
//                    $this->quality = $this->quality - $this->quality;
//                }
//            } else {
//                if ($this->quality < 50) {
//                    $this->quality = $this->quality + 1;
//                }
//            }
//        }
//    }

//    private function normalTick()
//    {
//        $this->sellIn -= 1;
//        if($this->quality <= 0){
//            return;
//        }
//
//        $this->quality -= 1;
//
//        if($this->sellIn <= 0 && $this->quality > 0){
//            $this->quality -= 1;
//        }
//
//    }

//    private function brieTick()
//    {
//        $this->sellIn -= 1;
//        $this->quality += 1;
//
//        if($this->sellIn <= 0){
//            $this->quality += 1;
//        }
//
//        if($this->quality > 50){
//            $this->quality = 50;
//        }
//    }

//    private function sulfurasTick()
//    {
//        //
//    }
//
//    private function backstagePassesTick()
//    {
//        $this->quality += 1;
//
//        if($this->sellIn <= 10){
//            $this->quality += 1;
//        }
//
//        if($this->sellIn <= 5){
//            $this->quality += 1;
//        }
//
//        if($this->sellIn <= 0){
//            $this->quality = 0;
//        }
//
//        if($this->quality > 50){
//            $this->quality = 50;
//        }
//
//        $this->sellIn -= 1;
//    }
}
