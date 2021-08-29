<?php

class Paypal extends PaymentMethod
{
	private $balance = 0;
	private $email;

	public function __construct($email, $password)
	{
		if ('hidayatchandra08@gmail.com' == $email && '12345' == $password) {
			$this->email = $email;
			echo "Login success \n";
		} else {
			throw new Exception("Username or password is wrong \n");
		}
	}

	public function credit($amount)
	{
		$this->sendNotification('credit');
		$this->balance -= $amount;
	}

	public function debit($amount)
	{
		$this->sendNotification('debit');
		$this->balance += $amount;
	}

	public function getBalance()
	{
		return $this->balance;
	}

	private function sendNotification($title)
	{
		echo "Sending email notification {$title} to {$this->email} \n";
	}
}
