<?php

class Point
{

    public int $x;
    public int $y;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }


}

function swapPoints($a, $b)
{
    $c = $a;
    $a = $b;
    $b = $c;

    echo "($a->x, $a->y)" . PHP_EOL;
    echo "($b->x, $b->y)" . PHP_EOL;


}

$p1 = new Point(5, 2);
$p2 = new Point(-3, 6);

swapPoints($p1, $p2);
