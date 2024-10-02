<?php

namespace App\StringCalculator;

use Exception;

class StringCalculator
{
    const MAX_NUMBER_ALLOWED = 1000;
    protected string $delimiter = ',|\n';
    public function add($numbers)
    {

        if(!$numbers){
            return 0;
        }

        $numbers = $this->parseString($numbers);
        $this->disallowNegatives($numbers);
        return array_sum($this
            ->ignoreGreaterThan1000($numbers));
    }

    /**
     * @param  array  $numbers
     * @return void
     * @throws Exception
     */
    protected function disallowNegatives(array $numbers): void
    {
        foreach ($numbers as $number) {
            if ($number < 0) {
                throw new Exception('Negative numbers are disallowed');
            }
        }
    }

    /**
     * @param $numbers
     * @param $matches
     * @param $delimiter
     * @return array
     */
    protected function parseString($numbers): array
    {
        $customDelimiter ='\/\/(.)\n';
        if (preg_match("/{$customDelimiter}/", $numbers, $matches)) {
            $this->delimiter = $matches[1];

            $numbers = str_replace($matches[0], "", $numbers);
        }

        return preg_split("/{$this->delimiter}/", $numbers);
    }

    /**
     * @param  array  $numbers
     * @return array
     */
    protected function ignoreGreaterThan1000(array $numbers): array
    {
        return array_filter($numbers, fn($number) =>  $number <= self::MAX_NUMBER_ALLOWED);
    }
}