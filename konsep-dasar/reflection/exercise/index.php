<?php

include 'App.php';

class Electricity
{
	public $watt = 100;
}

class Fuel
{
	public $gasoline = 5;
}

class Accu
{
	public $electricity;

	public function __construct(Electricity $electricity)
	{
		$this->electricity = $electricity;
	}
}

class Car
{
	public $fuel;
	public $accu;

	public function __construct(Fuel $fuel, Accu $accu)
	{
		$this->fuel = $fuel;
		$this->accu = $accu;
	}

	public function __toString()
	{
		return <<<"EOT"
        Car gasoline : {$this->fuel->gasoline} liter
        Car accu watt : {$this->accu->electricity->watt} watt
        EOT;
	}
}
$car = App::make('car');
echo $car;
