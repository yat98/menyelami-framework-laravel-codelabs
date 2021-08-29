<?php

	abstract class PaymentMethod
	{
		abstract public function credit($amount);

		abstract public function debit($amount);

		abstract public function getBalance();

		public function getPaymentMethod()
		{
			return 'Your pay with ' . __CLASS__ . "\n";
		}
	}
