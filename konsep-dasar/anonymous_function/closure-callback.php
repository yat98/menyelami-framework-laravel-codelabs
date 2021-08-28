<?php

$minimum = 75;
$scores = [
	['name' => 'Andi', 'score' => 70],
	['name' => 'Ahmad', 'score' => 80],
	['name' => 'Aldi', 'score' => 75],
];

array_map(function ($value) use ($minimum) {
	echo 'Name : ' . $value['name'] . "\n";
	echo 'Score : ' . $value['score'] . "\n";
	echo 'Status : ';
	if ($value['score'] >= $minimum) {
		echo "Lulus \n";
	} else {
		echo "Tidak Lulus \n";
	}
	echo "\n";
}, $scores);
