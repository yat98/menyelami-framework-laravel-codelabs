<?php

namespace App\Entity;

class CreditPhone implements PaymentMethod
{
	public $balance;
	public $phoneNumber;

	public function __construct($phoneNumber = '08xx-xxxx-xxxx', $balance = 0)
	{
		$this->phoneNumber = $phoneNumber;
		$this->balance = $balance;
	}

	public function getBalance()
	{
		return $this->balance;
	}
}
