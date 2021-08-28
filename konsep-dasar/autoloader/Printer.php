<?php

class Printer
{
	public function printBook($name)
	{
		echo 'Class ' . __CLASS__ . ' : ';
		echo "Print book {$name} \n";

		return "Book {$name}";
	}
}
