<?php
require_once 'FuelGauge.php';
require_once 'Odometer.php';
require_once 'Tire.php';
require_once 'Light.php';
require_once 'Accumulator.php';
require_once 'Car.php';


$name = readline('Car name: ');
$fuelGaugeAmount = (int)readline('Fuel Gauge amount: ');
$accumulator = (int)readline('Accumulator percentage: ');
$driveDistance = (int)readline('Drive distance: ');

$car = new Car($name, $fuelGaugeAmount, $accumulator);


echo "------ " . $car->getName() . " ------";
echo PHP_EOL;

while ($car->startEngine() && $car->validateAccumulator()) {
    while ($car->getFuel() > 0 && $car->validateTires() && $car->validateLights()) {
        echo "----" . PHP_EOL;
        echo "Fuel: " . $car->getFuel() . "l" . PHP_EOL;
        echo "Mileage: " . $car->getMileage() . "km" . PHP_EOL;
        echo "Accumulator: " . $car->getAccumulator() . "%" . PHP_EOL;

        foreach ($car->getTires() as $tire) {
            echo "Tire ({$tire->getName()}): {$tire->getCondition()}%" . PHP_EOL;
        }

        foreach ($car->getLights() as $light) {
            echo "Light ({$light->getName()}): {$light->getCondition()}%" . PHP_EOL;
        }

        $car->drive($driveDistance);

        sleep(1);
    }
}
