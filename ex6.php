<?php

$surveyed = 12467;
$purchased_energy_drinks = 0.14;
$prefer_citrus_drinks = 0.64;

function calculate_energy_drinkers(int $numberSurveyed, float $energyPercents): int
{
    return $numberSurveyed * $energyPercents;
}

function calculate_prefer_citrus(int $numberSurveyed, float $energyPercents, float $citrusPercents): int
{
    return ($numberSurveyed * $energyPercents) * $citrusPercents;
}


echo "Total number of people surveyed " . $surveyed . PHP_EOL;
echo "Approximately " . calculate_energy_drinkers($surveyed, $purchased_energy_drinks) . " bought at least one energy drink" . PHP_EOL;
echo calculate_prefer_citrus($surveyed, $purchased_energy_drinks, $prefer_citrus_drinks) . " of those " . "prefer citrus flavored energy drinks." . PHP_EOL;
