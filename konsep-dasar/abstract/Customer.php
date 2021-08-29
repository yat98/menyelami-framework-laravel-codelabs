<?php

class Customer
{
	private $name;
	private $paymentMethod;

	public function __construct($name = 'Anonymous', PaymentMethod $paymentMethod)
	{
		$this->name = $name;
		$this->paymentMethod = $paymentMethod;
	}

	public function buy($name = 'item', $total = 0)
	{
		if ($this->paymentMethod->getBalance() >= $total) {
			$this->paymentMethod->credit($total);
			echo "Success buy {$name} with price " . number_format($total, 0, ',', '.') . " \n";
			echo "Thank you {$this->name} \n";
		} else {
			echo "Your balance is not enough \n";
		}
	}
}
