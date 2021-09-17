<?php

namespace App\Entity;

class CreditCard implements PaymentMethod
{
	public $balance;
	public $cardNumber;

	public function __construct($cardNumber = 'xx-xx-xxxx-xxxx', $balance = 0)
	{
		$this->cardNumber = $cardNumber;
		$this->balance = $balance;
	}

	public function getBalance()
	{
		return $this->balance;
	}
}
