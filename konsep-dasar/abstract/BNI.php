<?php

include 'PaymentMethod.php';
class BNI extends PaymentMethod
{
	private $balance = 0;

	public function __construct($pin)
	{
		if ('12345' == $pin) {
			echo "Success activated BNI Card \n";
		} else {
			throw new Exception('Your pin is wrong');
		}
	}

	public function credit($amount)
	{
		$this->recordTransaction('credit', $amount);
		$this->balance -= $amount;
	}

	public function debit($amount)
	{
		$this->recordTransaction('debit', $amount);
		$this->balance += $amount;
	}

	public function getBalance()
	{
		return $this->balance;
	}

	private function recordTransaction($type, $total)
	{
		echo "Record {$type} transaction total " . number_format($total, 0, ',', '.') . " to balance \n";
	}
}
