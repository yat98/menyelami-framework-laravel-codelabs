<?php

include 'SocialThing.php';
include 'Shareable.php';
include 'Status.php';
include 'Photo.php';

$status = new Status('Lorem ipsum sit dolor');
$status->share();
$photo = new Status('Lorem.jpg');
$photo->share();