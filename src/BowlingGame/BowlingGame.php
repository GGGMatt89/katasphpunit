<?php

namespace App\BowlingGame;

class BowlingGame
{
    //bowling game, 10 frames per game, 2 rolls per frame
    //strike -> 2 following rolls score added twice
    //space -> 1 following roll score added twice

    const FRAMES_PER_GAME = 10;
    protected $rolls = [];

    public function roll($pins)
    {
        $this->rolls[] = $pins;
    }

    public function score()
    {
        $score = 0;
        $roll = 0;
        foreach(range(1, static::FRAMES_PER_GAME) as $frame) {
            //check for a strike
            if ($this->isStrike($roll)) {
                $score += $this->pinCount($roll) + $this->strikeBonus($roll);

                $roll += 1;
                continue;
            }
            //check for a spare
            if ($this->isSpare($roll))
            {
                $score += $this->spareBonus($roll);
            }
            $score += $this->defaultFrameScore($roll);

            $roll += 2;

        }

        return $score;
    }

    /**
     * @param $roll
     * @return bool
     */
    public function isStrike($roll)
    {
        return $this->pinCount($roll) === 10;
    }

    /**
     * @param $roll
     * @return bool
     */
    public function isSpare($roll)
    {
        return $this->defaultFrameScore($roll) === 10;
    }

    /**
     * @param $roll
     * @return mixed
     */
    public function defaultFrameScore($roll)
    {
        return $this->pinCount($roll) + $this->pinCount($roll + 1);
    }

    /**
     * @param $roll
     * @return mixed
     */
    public function spareBonus($roll)
    {
        return $this->pinCount($roll + 2);
    }

    /**
     * @param $roll
     * @return mixed
     */
    public function strikeBonus($roll)
    {
//        return $this->rolls[$roll + 1] + $this->rolls[$roll + 2];
        return $this->defaultFrameScore($roll + 1);
    }

    /**
     * @param $roll
     * @return mixed
     */
    public function pinCount($roll)
    {
        return $this->rolls[$roll];
    }
}