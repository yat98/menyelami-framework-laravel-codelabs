<?php

class App
{
	public static function make($class)
	{
		$reflector = new ReflectionClass($class);
		$constructor = $reflector->getConstructor();

		if (is_null($constructor)) {
			return new $class();
		}

		$dependencies = $constructor->getParameters();

		$args = [];

		foreach ($dependencies as $dependency) {
			if (is_null($dependency->getClass())) {
				array_push($args, $dependency->getDefaultValue());
			} else {
				array_push($args, self::make($dependency->getClass()->name));
			}
		}

		return $reflector->newInstanceArgs($args);
	}
}
