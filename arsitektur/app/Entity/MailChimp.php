<?php

namespace App\Entity;

class MailChimp
{
	public function subscribe($email)
	{
		return 'subscribing ' . $email . ' to mailchimp server';
	}
}
