<?php

include 'Customer.php';
include 'BNI.php';
include 'Paypal.php';

try {
	echo "=== BNI === \n";
	$bniCard = new BNI('12345');
	$bniCard->debit(2_000_000);
	$customer = new Customer('Hidayat', $bniCard);
	$customer->buy('Nike Air Jordan', 1_500_000);
	echo 'Balance : ' . number_format($bniCard->getBalance(), 0, ',', '.') . "\n\n";

	echo "=== PayPal === \n";
	$payPal = new Paypal('hidayatchandra08@gmail.com', '12345');
	$payPal->debit(25_000_000);
	$customer = new Customer('Yayat', $payPal);
	$customer->buy('MacBook Pro M1 2020', 19_999_000);
	echo 'Balance : ' . number_format($payPal->getBalance(), 0, ',', '.');
} catch (Exception $e) {
	echo $e->getMessage();
}
