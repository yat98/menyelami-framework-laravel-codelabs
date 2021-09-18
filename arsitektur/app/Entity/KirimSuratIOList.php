<?php

namespace App\Entity;

use App\Contracts\MailListContract;

class KirimSuratIOList implements MailListContract
{
	protected $kirimSuratIO;

	public function __construct(KirimSuratIO $kirimSuratIO)
	{
		$this->kirimSuratIO = $kirimSuratIO;
	}

	public function register($email)
	{
		return $this->kirimSuratIO->sendMail($email);
	}
}
