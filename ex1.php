<?php

class Product
{
    public string $name;
    public float $price;
    public int $amount;

    public function __construct(string $name, float $price, int $amount)
    {
        $this->name = $name;
        $this->price = $price;
        $this->amount = $amount;

    }

    public function printProduct(): string
    {
        return "$this->name, price $this->price, amount $this->amount" . PHP_EOL;
    }

    public function changePrice(): string
    {
        echo "$this->name current price: $this->price" . PHP_EOL;
        echo "Change price?" . PHP_EOL;
        $a = strtoupper(readline('Y/N: '));
        if ($a == 'Y') {
            $this->price = (int)readline('Add new price: ');
            return "Changes saved!" . PHP_EOL;
        } elseif ($a == 'N') {
            return "$this->name current price: $this->price" . PHP_EOL;
        } else {
            return 'Error' . PHP_EOL;
        }

    }

    public function changeAmount(): string
    {
        echo "$this->name current amount: $this->amount" . PHP_EOL;
        echo "Change amount?" . PHP_EOL;
        $b = strtoupper(readline('Y/N: '));
        if ($b == 'Y') {
            $this->amount = (int)readline('Change amount to: ');
            return "Changes saved! {$this->printProduct()}";
        } elseif ($b == 'N') {
            return $this->printProduct();
        } else {
            return 'Error' . PHP_EOL;
        }


    }

}


$mouse = new Product('Logitech mouse', 70.00, 14);
$phone = new Product('iPhone 5s', 999.99, 3);
$epson = new Product('Epson EB-U05', 440.46, 1);

//echo $mouse->printProduct();
//echo $phone->printProduct();
//echo $epson->printProduct();

$all = [];
while (true) {

    echo "CHANGE" . PHP_EOL;
    echo "[1] Logitech mouse | [2] iPhone 5s | [3] Epson EB-U05 | [4] Print changes | [Any] Exit" . PHP_EOL;
    $input = (int)readline('Select: ');

    switch ($input) {
        case 1:
            echo $mouse->changePrice();
            echo $mouse->changeAmount();
            $all[] = $mouse;
            break;
        case 2:
            echo $phone->changePrice();
            echo $phone->changeAmount();
            $all[] = $phone;
            break;
        case 3:
            echo $epson->changePrice();
            echo $epson->changeAmount();
            $all[] = $epson;
            break;
        case 4:
            foreach ($all as $item) {
                echo "*$item->name, price $item->price, amount $item->amount" . PHP_EOL;

            }
            break;
        default:
            exit;
    }
    echo "========" . PHP_EOL;
}
