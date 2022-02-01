<?php

class FuelGauge
{

    public int $fuel;

    public function __construct(int $fuel)
    {
        $this->fuel = $fuel;
    }

    public function getCurrentFuel(): int
    {
        return $this->fuel;
    }

    public function incrementFuel()
    {
        echo $this->getCurrentFuel();
        echo "FUEL UP!" . PHP_EOL;
        if ($this->fuel < 70) {
            echo "How much litres to fill?" . PHP_EOL;
            $input = (int)readline('L: ');
            $fuelSum = $input + $this->fuel;
            while ($this->fuel < $fuelSum) {
                //sleep(1);
                echo $this->fuel++ . '-';
            }
            return $this->fuel;
        } else {
            return "ITS FULL" .  $this->fuel = 70;
        }
    }

    public function decrementFuel()
    {
        if ($this->fuel > 0) {
            return $this->fuel = $this->fuel - 1;
        } else {
            return "ITS EMPTY $this->fuel";
        }
    }
}

class Odometer
{

    public float $mileage;

    public function __construct(float $mileage)
    {
        $this->mileage = $mileage;
    }

    public function getCurrentMileage(): int
    {
        return $this->mileage;
    }

    public function incrementMileage()
    {
        if ($this->mileage > 999.999) {
            return $this->mileage = 0;
        } else {
            return $this->mileage = $this->mileage + 1;
        }
    }

    public function connectOdometerWithFuel(FuelGauge $fuel)
    {

        echo PHP_EOL;
        echo "----" . PHP_EOL;
        echo "Current mileage: " . $this->getCurrentMileage() . PHP_EOL;
        echo "Current fuel amount: " . $fuel->getCurrentFuel() . PHP_EOL;
        echo "----" . PHP_EOL;
        readline('Press ENTER to drive!');

        while ($fuel->fuel != 0) {

            for ($i = 1; $i < 999.999; $i++) {
                $this->incrementMileage() . ' ';
                if ($i == 10) {
                    echo "------" . PHP_EOL;
                    echo "Current mileage: " . $this->getCurrentMileage() . PHP_EOL;
                    $fuel->decrementFuel();
                    echo "Current fuel amount: " . $fuel->getCurrentFuel() . PHP_EOL;
                    break;
                }
            }

        }
        echo "Drive is over - the fuel tank is empty" . PHP_EOL;


    }
}

$car1 = new FuelGauge(0);
echo $car1->incrementFuel();
$odometer1 = new Odometer(100);
$odometer1->connectOdometerWithFuel($car1);




