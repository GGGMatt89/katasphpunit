<?php

namespace App\TennisMatch;

class TennisMatch
{
    protected $playerOne;
    protected $playerTwo;

    public function __construct(Player $playerOne, Player $playerTwo)
    {
        $this->playerOne = $playerOne;
        $this->playerTwo = $playerTwo;
    }

    public function score()
    {
//        if($this->playerOnePoints > $this->playerTwoPoints){
//            return 'fifteen-love';
//        }
//        return 'love-love';

        //Check if we have a winner
        if($this->hasWinner()){
            return "Winner: " . $this->leader();
        }

        //check for advantage
        if($this->hasAdvantage()){
            return "Advantage: " . $this->leader();
        }

        //check for deuce
        if($this->isDeuce()){
            return 'deuce';
        }


        return sprintf(
            "%s-%s",
            $this->playerOne->toTerm(),
            $this->playerTwo->toTerm()
        );
    }

    /**
     * @return bool
     */
    public function hasWinner(): bool
    {
        if(max([$this->playerOne->points, $this->playerTwo->points]) < 4)
        {
            return false;
        }
        return abs($this->playerOne->points - $this->playerTwo->points) >= 2;
    }

    protected function leader(): string
    {
        return $this->playerOne->points > $this->playerTwo->points ? $this->playerOne->name : $this->playerTwo->name;
    }

    /**
     * @return bool
     */
    public function isDeuce(): bool
    {
        return $this->canBeWon() && $this->playerOne->points === $this->playerTwo->points;
    }

    protected function hasAdvantage(): bool
    {
        if($this->canBeWon()) return ! $this->isDeuce();
        return false;
    }

    /**
     * @return bool
     */
    public function canBeWon(): bool
    {
        return $this->playerOne->points >= 3 && $this->playerTwo->points >= 3;
    }
}