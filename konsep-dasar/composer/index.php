<?php

use Carbon\Carbon;

require 'vendor/autoload.php';
date_default_timezone_set('Asia/Makassar');
$date = Carbon::createFromDate(1945, 8, 17);
print_r('Kapan Indonesia merdeka ? ' . $date->diffForHumans());
