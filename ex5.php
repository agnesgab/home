<?php

class Date
{
    private int $month;
    private int $day;
    private int $year;


    public function __construct(int $month, int $day, int $year)
    {
        $this->month = $month;
        $this->day = $day;
        $this->year = $year;
    }

    private function setMonth(): int
    {
        return $this->month;
    }

    public function setDay(): int
    {
        return $this->day;
    }

    public function setYear(): int
    {
        return $this->year;
    }

    public function getMonth(): int
    {
        return $this->setMonth();
    }

    public function getDay(): int
    {
        return $this->setDay();
    }

    public function getYear(): int
    {
        return $this->setYear();
    }

    public function displayDate(): string
    {
        return "{$this->getMonth()}/{$this->getDay()}/{$this->getYear()}";
    }


}

//$a = new Date(1, 21, 2001);
//$b = new Date(9, 23, 1993);
//echo $a->displayDate() . PHP_EOL;
//echo $b->displayDate() . PHP_EOL;


function dateTest()
{
    echo "Add date" . PHP_EOL;

    $month = (int)readline('Month: ');
    $day = (int)readline('Day ');
    $year = (int)readline('Year: ');
    if ($month > 0 && $month <= 12 && $day > 0 && $day <= 31 && strlen($year) < 5) {
        $date = new Date($month, $day, $year);
        echo "New date created: {$date->displayDate()}" . PHP_EOL;
        //echo "[1] Echo month [2] Echo day [3] Echo year" . PHP_EOL;
        //$input = (int) readline('Select ');
    } else {
        echo "Please check your input";
        return false;
    }


//    switch ($input){
//        case 1:
//            echo "Month: {$date->getMonth()}" . PHP_EOL;
//            break;
//        case 2:
//            echo "Day: {$date->getDay()}" . PHP_EOL;
//            break;
//        case 3:
//            echo "Year: {$date->getYear()}" . PHP_EOL;
//            break;
//        default:
//            exit;
//
//    }


}


dateTest();
