<?php

$title = 'Mas';
$name = 'Hidayat Chandra';

$name = function () use ($title, $name) {
	return "{$title}, {$name}";
};

function canDoIt($name)
{
	echo "You can do it {$name}";
}

canDoIt($name());
