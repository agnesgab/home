<?php

class Car
{
    private string $name;
    private FuelGauge $fuelGauge;
    private Odometer $odometer;
    private Accumulator $accumulator;
    private array $tires;
    private array $lights;


    private const CONSUMPTION_PER_KM = 0.07; // 7L on 100km
    private const TIRE_QUALITY_LOSS_PER_KM = [1, 2];
    private const LIGHT_DAMAGE_LOW_BEAM = 3;
    private const LIGHT_DAMAGE_HIGH_BEAM = 1;

    public function __construct(string $name, int $fuelGaugeAmount, int $accumulator)
    {
        $this->name = $name;
        $this->fuelGauge = new FuelGauge($fuelGaugeAmount);
        $this->odometer = new Odometer();
        $this->accumulator = new Accumulator($accumulator);

        $this->tires = [
            new Tire('Front-left', 100),
            new Tire('Front-right', 100),
            new Tire('Rear-left', 100),
            new Tire('Rear-right', 100)
        ];

        $this->lights = [
            new Light('Low beam'),
            new Light('High beam')

        ];
    }

    public function drive(int $distance = 10): void
    {
        if ($this->fuelGauge->getFuel() <= 0) return;

        $this->fuelGauge->change($distance * -self::CONSUMPTION_PER_KM);
        $this->odometer->addMileage($distance);
        $this->accumulator->changeAccumulator(rand(1, 5));

        [$minDamage, $maxDamage] = self::TIRE_QUALITY_LOSS_PER_KM;
        foreach ($this->tires as $tire) {
            $tire->changeCondition(rand($minDamage * $distance, $maxDamage * $distance));
        }

        foreach ($this->lights as $light) {
            if ($light->getName() == 'Low beam') {
                $light->changeCondition(self::LIGHT_DAMAGE_LOW_BEAM);
            } else {
                $light->changeCondition(self::LIGHT_DAMAGE_HIGH_BEAM);
            }
        }

    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getFuel(): float
    {
        return $this->fuelGauge->getFuel();
    }

    public function getMileage(): int
    {
        return $this->odometer->getMileage();
    }

    public function getAccumulator(): int
    {
        return $this->accumulator->getAccumulator();
    }

    public function validateAccumulator(): bool
    {
        if ($this->accumulator->getAccumulator() < 5) {
            echo "Accumulator % too low" . PHP_EOL;
            return false;
        }

        return true;
    }

    public function getTires(): array
    {
        return $this->tires;
    }

    public function validateTires(): bool
    {
        $brokenTires = [];
        foreach ($this->tires as $tire) {
            if ($tire->getCondition() <= 0) {
                $brokenTires[] = $tire;
            }
        }

        return count($brokenTires) < 2;
    }

    public function getLights(): array
    {
        return $this->lights;
    }

    public function validateLights(): bool
    {
        foreach ($this->lights as $light) {
            if ($light->getCondition() <= 50) {
                return false;
            }
        }
        return true;
    }

    public function startEngine(): bool
    {
        if ($this->getFuel() > 8) {
            echo "Engine started" . PHP_EOL;
            return true;
        } else {
            echo "Not enough fuel" . PHP_EOL;
            return false;
        }
    }


}