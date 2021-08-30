<?php

include 'Twitter.php';
$tw = new Twitter('Hidayat', 'Lorem ipsum sit dolor');
echo 'Akun twitter : ' . $tw->getUsername() . "\n";
echo 'Tweet : ' . $tw->getTweet() . "\n";
echo 'Class dari $tw adalah ' . get_class($tw) . "\n";
echo 'Parent class dari $tw adalah ' . get_parent_class($tw) . "\n";
echo 'Method class dari $tw adalah ';
print_r(get_class_methods($tw));
echo "\n";
