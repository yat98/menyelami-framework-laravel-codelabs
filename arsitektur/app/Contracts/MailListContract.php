<?php

namespace App\Contracts;

interface MailListContract
{
	/**
	 * Mendaftarkan email ke server mailing list.
	 *
	 * @param string $email
	 */
	public function register($email);
}
