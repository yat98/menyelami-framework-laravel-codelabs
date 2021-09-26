<?php

namespace App\Entity;

class School
{
	protected $name;
	protected $address;

	public function __construct($name, $address)
	{
		$this->name = $name;
		$this->address = $address;
	}

	public function __toString()
	{
		return json_encode([
			'nama' => $this->name,
			'address' => $this->address,
		]);
	}
}
