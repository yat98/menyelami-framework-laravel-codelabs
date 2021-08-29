<?php

include 'Facebook.php';
include 'Twitter.php';
include 'SocialGraph.php';

$fb1 = new Facebook('Joko Widodo', 'Lorem ipsum sit dolor');
$fb1->like();
$fb1->like();

$fb2 = new Facebook('Linus torvald', 'Dolor sit ipsum lorem');
$fb2->like();
$fb2->like();
$fb2->like();

$tw1 = new Twitter('Brendan Eich', 'Sit lorem ipsum dolor');
$tw1->favourite();
$tw1->favourite();
$tw1->favourite();
$tw1->favourite();

$tw2 = new Twitter('Rasmus Lerdorf', 'Ipsum dolor sit lorem');
$tw2->favourite();

$socialGraph = new SocialGraph();
$socialGraph->compareLike($fb1, $fb2);
$socialGraph->compareLike($tw1, $tw2);
$socialGraph->compareLike($tw2, $fb1);
$socialGraph->compareLike($tw1, $fb2);
