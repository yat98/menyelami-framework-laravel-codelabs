<?php

spl_autoload_register();
$bitly = new \Bitly\URLShortener();
$gue = new \Gue\URLShortener();
$login = new \Bitly\Auth\Login();
