<?php

namespace App\Entity;

class Seller
{
	private $paymentMethod;

	public function __construct(PaymentMethod $paymentMethod)
	{
		$this->setPaymentMethod($paymentMethod);
	}

	public function setPaymentMethod($paymentMethod)
	{
		$this->paymentMethod = $paymentMethod;
	}

	public function getPayment()
	{
		return $this->paymentMethod;
	}

	public function getPaymentBalance()
	{
		return $this->paymentMethod->balance;
	}
}
