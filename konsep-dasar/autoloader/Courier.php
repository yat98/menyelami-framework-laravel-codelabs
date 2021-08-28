<?php

class Courier
{
	public function send($itemName, $to)
	{
		echo 'Class ' . __CLASS__ . ' : ';
		echo "Sending {$itemName} to {$to}";
	}
}
