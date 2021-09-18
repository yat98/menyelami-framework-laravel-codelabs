<?php

namespace App\Entity;

use App\Contracts\MailListContract;

class MailChimpList implements MailListContract
{
	protected $mailChimp;

	public function __construct(MailChimp $mailChimp)
	{
		$this->mailChimp = $mailChimp;
	}

	public function register($email)
	{
		return $this->mailChimp->subscribe($email);
	}
}
