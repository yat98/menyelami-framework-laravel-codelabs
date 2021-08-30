<?php

class Student
{
	private $name;
	private $address;
	private $weight;

	public function __get($attribute)
	{
		if (property_exists($this, $attribute)) {
			if (method_exists($this, 'get' . $attribute)) {
				return call_user_func([$this, 'get' . $attribute]);
			}

			return $this->{$attribute};
		}
	}

	public function __set($attribute, $value)
	{
		if (property_exists($this, $attribute)) {
			$this->{$attribute} = $value;
		}
	}

	public function getWeight()
	{
		return $this->weight . ' kg';
	}
}

$student = new Student();
$student->name = 'Hidayat';
$student->address = 'Gorontalo';
$student->weight = 52;
echo 'Student ' . $student->name . ' address ' . $student->address . ' weight ' . $student->weight;
