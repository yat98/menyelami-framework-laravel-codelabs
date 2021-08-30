<?php

include 'Author.php';
include 'Book.php';
$author = new Author('James Clear', 'USA');
$book = new Book('Atomic Habit', $author);
echo $book . "\n";
echo "============================================= \n";
$reflector = new ReflectionClass($book);
echo $reflector->getName() . "\n";
echo $reflector->getParentClass()->getName() . "\n";
print_r($reflector->getInterfaceNames()) . "\n";
print_r($reflector->getMethods()) . "\n";
$constructor = $reflector->getConstructor();
$parameters = $constructor->getParameters();
print_r($constructor) . "\n";
print_r($parameters) . "\n";
// getClass() are deprecated in PHP 8 instead use getType()
print_r($parameters[1]->getClass()) . "\n";
print_r($parameters[0]->getDefaultValue()) . "\n";
