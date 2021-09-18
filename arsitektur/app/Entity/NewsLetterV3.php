<?php

namespace App\Entity;

use App\Contracts\MailListContract;
use Illuminate\Log\LogManager;

class NewsLetterV3
{
	protected $mailList;
	protected $logger;

	public function __construct(MailListContract $mailList, LogManager $logger)
	{
		$this->mailList = $mailList;
		$this->logger = $logger;
	}

	public function register($email)
	{
		$this->logger->info('Register new user : ' . $email);

		return $this->mailList->register($email);
	}
}
