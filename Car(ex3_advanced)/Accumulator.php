<?php

class Accumulator
{

    public int $percentage;


    public function __construct(int $percentage)
    {
        $this->percentage = $percentage;
    }


    public function changeAccumulator(int $percent)
    {
        $this->percentage += $percent;
    }

    public function getAccumulator(): int
    {
        return $this->percentage;
    }
}