<?php

spl_autoload_register(function ($class) {
	include $class . '.php';
});

$printer = new Printer();
$book = $printer->printBook('Menyelami framework Laravel');

$courier = new Courier();
$courier->send($book, 'Gorontalo');
